<?php

namespace App\Http\Providers;

use App\Http\Models\QuestionsItem;
use App\Http\Models\Lsa_Term;
use App\Http\Models\Lsa_U;
use Illuminate\Support\Facades\DB;

class Semantic
{
    private $max_value = -1;
    private $item_data = null;
    private $input_data = array(
        'student_ans' => null,
        'item_id' => null,
        'exam_paper_id' => null,
    );
    private $user_id = 'kbc';

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 取得試題的資料
     */
    public function get_item_data()
    {
        $t = QuestionsItem::where('id', $this->input_data['item_id'])
            ->where('exam_paper_id',$this->input_data['exam_paper_id'])
            ->get();
        foreach ($t as $v) {
            $this->item_data = $v;
        }
    }

    /**
     * 使用語意分析答案
     */
    public function analy()
    {
        try{
            if ($this->input_data['item_id'] AND $this->input_data['student_ans'] AND $this->item_data) {
                $right_ans = json_decode($this->item_data['correct_answer'],true);
                $error_ans = json_decode($this->item_data['error_answer'],true);
                $ckipclient_obj = new Ckipclient(
                    env('CKIP_SERVER'),
                    env('CKIP_PORT'),
                    env('CKIP_USERNAME'),
                    env('CKIP_PASSWORD')
                );
                $return_text = $ckipclient_obj->send($this->input_data['student_ans']);    //----進行斷詞----//
                $return_sentences = $ckipclient_obj->getSentence();
                $stuans_return_terms = $ckipclient_obj->getTerm();

                for ($i = 0; $i < count($stuans_return_terms); $i++) {
                    $stu_ans_terms[$i] = $stuans_return_terms[$i]['term'];
                }
                for ($i = 0, $num = 0; $i < count($stuans_return_terms); $i++) {
                    $stu_ans_sentence[$num] = $stuans_return_terms[$i]['term'];
                    $stu_ans_sentence[$num + 1] = "(" . $stuans_return_terms[$i]['tag'] . ")";
                    $num += 2;
                }
                $stu_ans_sentence = $this->parts_of_speech_change($stu_ans_sentence);//BayesianTest/segmentation.php
                $stu_ans_new = '';
                for ($i = 0; $i < count($stu_ans_sentence); $i++) {
                    $stu_ans_new = $stu_ans_new . $stu_ans_sentence[$i];
                }

                $stu_ans_new = $this->words_segmentation($stu_ans_new);//BayesianTest/segmentation.php
                $stu_ans_term = explode(",", $stu_ans_new);
                $Answer_vector = $this->document_vector($stu_ans_term);     //---學生答案向量 BayesianTest/lsa_compute.php

                //-----中文句子剖析處理-----//
                $parser_text_stu = $this->sentence_parser_stu($this->input_data['student_ans'], $this->user_id);   //學生答案 BayesianTest/segmentation.php
                $parser_text_stu = $this->parser_process($parser_text_stu);//BayesianTest/segmentation.php
                $document_stu = str_replace('(', ',', $parser_text_stu);
                $document_stu = str_replace(':', ',', $document_stu);
                $document_stu = str_replace(')', ',', $document_stu);
                $stu_doc = explode(",", $document_stu);
                $num = 0;
                $stu_nodes = array();
                for ($j = 0; $j < count($stu_doc); $j++) {
                    if (preg_match("/[\x{4e00}-\x{9fa5}]/u", $stu_doc[$j])) {
                    } else {
                        $stu_nodes[$num] = $stu_doc[$j];
                        $num++;
                    }
                }

                $t_num = count($right_ans[0]['answer']);
                for ($x = 0; $x < $t_num; $x++) {           //---與預期答案比對---//
                    $sentence2 = $right_ans[0]['answer'][$x];
                    //----斷字----//
                    for ($j = 0; $j < mb_strlen($sentence2, 'utf8'); $j++) {
                        $split_sentence2[$j] = mb_substr($sentence2, $j, 1, 'utf-8');
                    }
                    $return_text = $ckipclient_obj->send($sentence2);      //----進行斷詞----//
                    $return_sentences = $ckipclient_obj->getSentence();
                    $expect_return_terms = $ckipclient_obj->getTerm();
                    $contentword_overlap_value = $this->contentword_overlap($stuans_return_terms, $expect_return_terms); //BayesianTest/cohmetrix_indices.php    //---content words overlap---//
                    $num = 0;
                    for ($i = 0; $i < count($expect_return_terms); $i++) {
                        $expect_ans_sentence[$num] = $expect_return_terms[$i]['term'];
                        $expect_ans_sentence[$num + 1] = "(" . $expect_return_terms[$i]['tag'] . ")";
                        $num = $num + 2;
                    }
                    $expect_ans_sentence = $this->parts_of_speech_change($expect_ans_sentence);//BayesianTest/segmentation.php
                    $expect_ans_new = '';
                    for ($i = 0; $i < count($expect_ans_sentence); $i++) {
                        $expect_ans_new = $expect_ans_new . $expect_ans_sentence[$i];
                    }
                    $expect_ans_new = $this->words_segmentation($expect_ans_new);//BayesianTest/segmentation.php
                    $expect_ans_term = explode(",", $expect_ans_new);
                    for ($i = 0; $i < count($expect_return_terms); $i++) {
                        $expect_ans[$i] = $expect_return_terms[$i]['term'];
                    }

                    $word_med = $this->word_MED($stu_ans_terms, $expect_ans);//BayesianTest/cohmetrix_indices.php               //---詞彙最小編輯距離---//
                    $MED_parts_of_speech = $this->parts_of_speech_MED($stuans_return_terms, $expect_return_terms); //BayesianTest/cohmetrix_indices.php      //---詞彙最小編輯距離(詞性)---//
                    $word_med = 1 - (($word_med + $MED_parts_of_speech) / 2);
                    $expect_ans_vector = $this->document_vector($expect_ans_term);//BayesianTest/lsa_compute.php
                    $getValue = round($this->document_sim($Answer_vector, $expect_ans_vector), 4);     //LSA cosine值
                    //-----中文句子剖析處理-----//
                    $parser_text_ans = $this->sentence_parser($sentence2, $this->user_id);//BayesianTest/segmentation.php   //學生答案
                    $parser_text_ans = $this->parser_process($parser_text_ans);//BayesianTest/segmentation.php
                    $parser_text_ans = str_replace('(', ',', $parser_text_ans);
                    $parser_text_ans = str_replace(':', ',', $parser_text_ans);
                    $parser_text_ans = str_replace(')', ',', $parser_text_ans);
                    $ans_doc = explode(",", $parser_text_ans);
                    $num = 0;
                    $ans_nodes = array();
                    for ($j = 0; $j < count($ans_doc); $j++) {
                        if (preg_match("/[\x{4e00}-\x{9fa5}]/u", $ans_doc[$j])) {
                        } else {
                            $ans_nodes[$num] = $ans_doc[$j];
                            $num++;
                        }
                    }

                    $syntax_similarity = $this->syntax_sim($stu_nodes, $ans_nodes);//BayesianTest/cohmetrix_indices.php
                    /** todo 從資料庫取得單元的公式乘法資料，在計算=>建議從for外面取，在帶進來避免重複取值 */
                    $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                    $threshold = 0.85;

                    if ($getValue > $threshold) {
                        return array(
                            'type' => 'right',
                            'jump' => $right_ans[1]['jump'][$x],
                        );
                    }
                }
                //開始分析錯誤答案
                /** todo 從資料庫取得單元的公式乘法資料，在計算=>建議從for外面取，在帶進來避免重複取值 */
                $content_par = 0.4;
                $lsa_par = 0.3;
                $syntax_pay=0.4;

                $stu_ans = $this->input_data['student_ans'];
                $max_value = -1; //初始 max_value
                $at_stu_answer_sol = 0;
                $at_expection_error = $error_ans;  //-----錯誤bug
                $sentence_num = (count($at_expection_error));
                if ($stu_ans == null) {
                    return array(
                        'type' => 'no_match',
                        'jump' => $error_ans[1]['jump'][$x],
                    );
                } else {
                    $t_num = count($error_ans[0]['answer']);
                    for ($x = 0; $x < $t_num; $x++) {
                        $error_sentence = $error_ans[0]['answer'][$x];
                        $return_text = $ckipclient_obj->send($error_sentence);      //----進行斷詞----//
                        $return_sentences = $ckipclient_obj->getSentence();
                        $error_return_terms = $ckipclient_obj->getTerm();
                        $error_ans_term = $this->sentence_revise($error_return_terms);
                        $expect_error_vector = $this->document_vector($error_ans_term);
                        $lsa = round($this->document_sim($Answer_vector, $expect_error_vector), 4);        //LSA cosine
                        $contentword_overlap_value = $this->contentword_overlap($stuans_return_terms, $error_return_terms);     //---content words overlap---//
                        //-----中文句子剖析處理-----//
                        $parser_text_ans = $this->sentence_parser($error_sentence, $this->user_id);   //學生答案
                        $parser_text_ans = $this->parser_process($parser_text_ans);
                        $parser_text_ans = str_replace('(', ',', $parser_text_ans);
                        $parser_text_ans = str_replace(':', ',', $parser_text_ans);
                        $parser_text_ans = str_replace(')', ',', $parser_text_ans);
                        $ans_doc = explode(",", $parser_text_ans);
                        $num = 0;
                        $ans_nodes = array();
                        for ($j = 0; $j < count($ans_doc); $j++) {
                            if (preg_match("/[\x{4e00}-\x{9fa5}]/u", $ans_doc[$j])) {
                            } else {
                                $ans_nodes[$num] = $ans_doc[$j];
                                $num++;
                            }
                        }
                        $syntax_similarity = $this->syntax_sim($stu_nodes, $ans_nodes);
                        $getValue = $content_par * $contentword_overlap_value + $lsa_par * $lsa + $syntax_pay * $syntax_similarity;
                        if ($getValue > $max_value and $getValue > 0.5) {
                            return array(
                                'type' => 'error',
                                'jump' => $error_ans[1]['jump'][$x],
                            );
                        }
                    }
                }

                //正確、錯誤答案都沒有比對成功，直接讓前端去處理
                return array(
                    'type' => 'no_match',
                    'jump' => '',
                );
            }
        }catch (\Exception $e){
            //dd($e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }


    private function parts_of_speech_change($word)
    {
        try{
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(M)' and $word[$i + 6] == '(N)') {
                        $word[$i + 2] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(DET)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(M)' and $word[$i + 6] == '(N)') {
                        $word[$i + 2] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(Vt)' and $word[$i + 6] == '(Vi)') {
                        $word[$i + 2] = '(ADJ)';
                        $word[$i + 6] = '(N)';
                    }
                }
            }

            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(Vi)' and $word[$i + 2] == '(Vt)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                        $word[$i] = '(ADJ)';
                        $word[$i + 2] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(Vi)' and $word[$i + 2] == '(N)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                        $word[$i] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(Vi)') {
                        $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                        $word[$i + 2] = '(ADJ)';
                        unset($word[$i + 3]);
                        unset($word[$i + 4]);
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(Vi)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)' and $word[$i + 6] == '(Vi)') {
                        $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                        $word[$i] = '(ADJ)';
                        $word[$i + 6] = '(ADJ)';
                        unset($word[$i + 1]);
                        unset($word[$i + 2]);
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                        $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                        $word[$i + 2] = '(ADJ)';
                        unset($word[$i + 3]);
                        unset($word[$i + 4]);
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) ) {
                    if ($word[$i] == '(Vi)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)') {
                        $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                        $word[$i] = '(ADJ)';
                        unset($word[$i + 2]);
                        unset($word[$i + 1]);
                    }
                }
            }

            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) ) {
                    if ($word[$i] == '(Vt)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)') {
                        $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                        $word[$i] = '(ADJ)';
                        unset($word[$i + 2]);
                        unset($word[$i + 1]);
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(N)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)') {
                        $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                        $word[$i] = '(ADJ)';
                        unset($word[$i + 2]);
                        unset($word[$i + 1]);
                    }
                }

            }

            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(M)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(N)') {
                        $word[$i + 2] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(Vt)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(N)') {
                        $word[$i + 2] = '(ADJ)';
                    }
                }
            }

            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(Vt)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(Vt)') {
                        $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                        $word[$i] = '(ADV)';
                        unset($word[$i + 2]);
                        unset($word[$i + 1]);
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(Vi)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(Vt)') {
                        $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                        $word[$i] = '(ADV)';
                        unset($word[$i + 2]);
                        unset($word[$i + 1]);
                    }
                }
            }

            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(N)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(Vt)') {
                        $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                        $word[$i + 2] = '(ADV)';
                        unset($word[$i + 4]);
                        unset($word[$i + 3]);
                    }
                }
            }

            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(N)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(Vi)') {
                        $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                        $word[$i + 2] = '(ADV)';
                        unset($word[$i + 4]);
                        unset($word[$i + 3]);
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(Vt)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(Vi)') {
                        $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                        $word[$i] = '(ADV)';
                        unset($word[$i + 2]);
                        unset($word[$i + 1]);
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)') {
                        $word[$i + 2] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4])) {
                    if ($word[$i] == '(Vi)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(Vt)') {
                        $word[$i + 2] = '(ADV)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) ) {
                    if ($word[$i] == '(Vi)' and $word[$i + 2] == '(N)') {
                        $word[$i] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) ) {
                    if ($word[$i] == '(N)' and $word[$i + 2] == '(Vi)') {
                        $word[$i + 2] = '(ADJ)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(N)' and $word[$i + 2] == '(ADJ)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                        $word[$i + 2] = '(Vt)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) and isset($word[$i + 6])) {
                    if ($word[$i] == '(P)' and $word[$i + 2] == '(N)' and $word[$i + 4] == '(N)' and $word[$i + 6] == '(ADJ)') {
                        $word[$i + 6] = '(Vi)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) ) {
                    if ($word[$i] == '(P)' and $word[$i + 2] == '(N)' and $word[$i + 4] == '(ADJ)') {
                        $word[$i + 4] = '(Vi)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) ) {
                    if ($word[$i] == '(N)' and $word[$i + 2] == '(ADJ)' and $word[$i + 4] == '(P)') {
                        $word[$i + 2] = '(Vi)';
                    }
                }
            }
            for ($i = 0; $i < count($word); $i++) {
                if (isset($word[$i]) and isset($word[$i + 2]) and isset($word[$i + 4]) ) {
                    if ($word[$i] == '(N)' and $word[$i + 2] == '(ADJ)' and $word[$i + 4] == '(ASP)') {
                        $word[$i + 2] = '(Vi)';
                    }
                }
            }
            $new_word = array_values($word);
            unset($new_word[count($new_word) - 1]);

            return $new_word;

        }catch (\Exception $e){
            //dd('parts_of_speech_change '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }

    private function words_segmentation($new_txt)
    {
        try{
            $new_txt = str_replace('(A)', ',', $new_txt);
            $new_txt = str_replace('(C)', ',', $new_txt);
            $new_txt = str_replace('(POST)', ',', $new_txt);
            $new_txt = str_replace('(ADV)', ',', $new_txt);
            $new_txt = str_replace('(T)', ',', $new_txt);
            $new_txt = str_replace('(ASP)', ',', $new_txt);
            $new_txt = str_replace('(FW)', ',', $new_txt);
            $new_txt = str_replace('(N)', ',', $new_txt);
            $new_txt = str_replace('(DET)', ',', $new_txt);
            $new_txt = str_replace('(ADJ)', ',', $new_txt);
            $new_txt = str_replace('(M)', ',', $new_txt);
            $new_txt = str_replace('(Nv)', ',', $new_txt);
            $new_txt = str_replace('(P)', ',', $new_txt);
            $new_txt = str_replace('(Vt)', ',', $new_txt);
            $new_txt = str_replace('(Vi)', ',', $new_txt);
            $new_txt = str_replace('(PARENTHESISCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(COMMACATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(QUESTIONCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(DASHCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(ETCCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(EXCLANATIONCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(PAUSECATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(SEMICOLONCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(SPCHANGECATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(PERIODCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(COLONCATEGORY)', ',', $new_txt);
            $new_txt = str_replace('(EXCLAMATIONCATEGORY)', ',', $new_txt);

            return $new_txt;
        }catch (\Exception $e){
            //dd('words_segmentation '.$e->getMessage());
                return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }

    /**
     *
     * @param $str
     * @return mixed
     */
    private function document_vector($str)
    {
        try{
            $dimension = 300;
            $word = array_values(array_unique($str));
            $a = array_count_values($word);
            $document_vector = array();
            $vector = array();
            for ($i = 0; $i < count($word); $i++) {
                $t = Lsa_Term::where('word', DB::raw("binary '$word[$i]'"))
                    ->get();
                foreach($t as $v){
                    $t2 = Lsa_U::where('id',$v['id'])->get();
                    foreach($t2 as $v2){
                        for ($k = 1; $k <= $dimension; $k++) {
                            $d='d'.$k;
                            $vector[$k][$i] = log($a[$word[$i]] + 1) * $v['global_weight'] * $v2[$d];
                        }
                    }
                }
            }
            $b = 0;
            for ($k = 1; $k <= $dimension; $k++) {
                if(isset($vector[$k])){
                    $document_vector[$k] = array_sum($vector[$k]);
                }else{
                    $document_vector[$k] = 0;
                }
                $c = $document_vector[$k] * $document_vector[$k];
                $b = $b + $c;
            }
            $txt_vector_length = sqrt($b);
            $txt_vector['text_vector'] = $document_vector;
            $txt_vector['text_vector_length'] = $txt_vector_length;

            return $txt_vector;
        }catch (\Exception $e){
            //dd('document_vector '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }

    }

    /**
     *
     *
     * @param $stu_response
     * @param $user_id
     * @return mixed|string
     */
    public function sentence_parser_stu($stu_response, $user_id)
    {
        $path = base_path('segmentation');
        $response = mb_convert_encoding($stu_response, "big5", "utf-8");
        $filename = $path .'/'. $user_id . "/input/stuans.txt";
        $ckipjar = $path .'/' . $user_id . "/CkipClient.jar";
        $ckipsockets = "segmentation/" . $user_id . "//ckipsocket.propeties";
        $inputfilename = $path .'/' . $user_id . "/input";
        $outputfilename = $path .'/' . $user_id . "/output";
        $fp = fopen($filename, "w");
        fputs($fp, $response);
        fclose($fp);
        exec("java -jar $ckipjar $ckipsockets $inputfilename $outputfilename");
        $str = file_get_contents($path .'/' . $user_id . "/output/stuans.txt");
        $content = mb_convert_encoding($str, "utf-8", "big5");

        return $content;
    }


    private function parser_process($new_txt)
    {
        $new_txt = str_replace('#1', ' ', $new_txt);
        $new_txt = str_replace('(PARENTHESISCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(COMMACATEGORY)', '', $new_txt);
        $new_txt = str_replace('(PERIODCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(PAUSECATEGORY)', '', $new_txt);
        $new_txt = str_replace(':(COLONCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(SEMICOLONCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(EXCLANATIONCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(SPCHANGECATEGORY)', '', $new_txt);
        $new_txt = str_replace('(QUESTIONCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(DASHCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(EXCLAMATIONCATEGORY)', '', $new_txt);
        $new_txt = str_replace('(conjunction)', '', $new_txt);
        $new_txt = str_replace(':1.', '', $new_txt);
        $new_txt = str_replace('2', '', $new_txt);
        $new_txt = str_replace('3', '', $new_txt);
        $new_txt = str_replace('4', '', $new_txt);
        $new_txt = str_replace('5', '', $new_txt);
        $new_txt = str_replace('6', '', $new_txt);
        $new_txt = str_replace('7', '', $new_txt);
        $new_txt = str_replace('8', '', $new_txt);
        $new_txt = str_replace('9', '', $new_txt);
        $new_txt = str_replace('0', '', $new_txt);
        $new_txt = str_replace('1', '', $new_txt);
        $new_txt = str_replace('#', '', $new_txt);
        $new_txt = str_replace(' ', '', $new_txt);
        $new_txt = str_replace('[]', '', $new_txt);
        $new_txt = str_replace('；', '', $new_txt);
        $new_txt = str_replace('。', '', $new_txt);
        $new_txt = str_replace('！', '', $new_txt);
        $new_txt = str_replace('？', '', $new_txt);
        $new_txt = str_replace('?', '', $new_txt);
        $new_txt = str_replace('，', '', $new_txt);
        $new_txt = str_replace('‧', '', $new_txt);
        $new_txt = str_replace('|', ')', $new_txt);
        $new_txt = str_replace('))))))', ')', $new_txt);
        $new_txt = str_replace(')))))', ')', $new_txt);
        $new_txt = str_replace('))))', ')', $new_txt);
        $new_txt = str_replace(')))', ')', $new_txt);
        $new_txt = str_replace('))', ')', $new_txt);
        $new_txt = str_replace(',', '', $new_txt);
        $new_txt = str_replace('%', '', $new_txt);
        $new_txt = str_replace('Head:', '', $new_txt);
        $new_txt = str_replace('head:', '', $new_txt);
        $new_txt = str_replace('agent:', '', $new_txt);
        $new_txt = str_replace('addition:', '', $new_txt);
        $new_txt = str_replace('alternative:', '', $new_txt);
        $new_txt = str_replace('apposition:', '', $new_txt);
        $new_txt = str_replace('aspect:', '', $new_txt);
        $new_txt = str_replace('avoidance:', '', $new_txt);
        $new_txt = str_replace('benefactor:', '', $new_txt);
        $new_txt = str_replace('causer:', '', $new_txt);
        $new_txt = str_replace('companion:', '', $new_txt);
        $new_txt = str_replace('comparison:', '', $new_txt);
        $new_txt = str_replace('complement:', '', $new_txt);
        $new_txt = str_replace('condition:', '', $new_txt);
        $new_txt = str_replace('concession:', '', $new_txt);
        $new_txt = str_replace('conclusion:', '', $new_txt);
        $new_txt = str_replace('contrast:', '', $new_txt);
        $new_txt = str_replace('conversion:', '', $new_txt);
        $new_txt = str_replace('degree:', '', $new_txt);
        $new_txt = str_replace('deixis:', '', $new_txt);
        $new_txt = str_replace('deontics:', '', $new_txt);
        $new_txt = str_replace('duration:', '', $new_txt);
        $new_txt = str_replace('epistemics:', '', $new_txt);
        $new_txt = str_replace('evaluation:', '', $new_txt);
        $new_txt = str_replace('exclusion:', '', $new_txt);
        $new_txt = str_replace('experiencer:', '', $new_txt);
        $new_txt = str_replace('frequency:', '', $new_txt);
        $new_txt = str_replace('goal:', '', $new_txt);
        $new_txt = str_replace('imperative:', '', $new_txt);
        $new_txt = str_replace('inclusion:', '', $new_txt);
        $new_txt = str_replace('instrument:', '', $new_txt);
        $new_txt = str_replace('interjection:', '', $new_txt);
        $new_txt = str_replace('listing:', '', $new_txt);
        $new_txt = str_replace('location:', '', $new_txt);
        $new_txt = str_replace('manner:', '', $new_txt);
        $new_txt = str_replace('negation:', '', $new_txt);
        $new_txt = str_replace('nominal:', '', $new_txt);
        $new_txt = str_replace('particle:', '', $new_txt);
        $new_txt = str_replace('possessor:', '', $new_txt);
        $new_txt = str_replace('predication:', '', $new_txt);
        $new_txt = str_replace('property:', '', $new_txt);
        $new_txt = str_replace('purpose:', '', $new_txt);
        $new_txt = str_replace('quantifier:', '', $new_txt);
        $new_txt = str_replace('quantity:', '', $new_txt);
        $new_txt = str_replace('range:', '', $new_txt);
        $new_txt = str_replace('reason:', '', $new_txt);
        $new_txt = str_replace('recipient:', '', $new_txt);
        $new_txt = str_replace('rejection:', '', $new_txt);
        $new_txt = str_replace('restriction:', '', $new_txt);
        $new_txt = str_replace('result:', '', $new_txt);
        $new_txt = str_replace('selection:', '', $new_txt);
        $new_txt = str_replace('source:', '', $new_txt);
        $new_txt = str_replace('standard:', '', $new_txt);
        $new_txt = str_replace('target:', '', $new_txt);
        $new_txt = str_replace('theme:', '', $new_txt);
        $new_txt = str_replace('time:', '', $new_txt);
        $new_txt = str_replace('topic:', '', $new_txt);
        $new_txt = str_replace('uncondition:', '', $new_txt);
        $new_txt = str_replace('whatever:', '', $new_txt);

        return $new_txt;
    }


    private function contentword_overlap($stuans_return_terms, $expect_return_terms)
    {
        try{
            $common_words_tag = array();
            //---local---//
            for ($i = 0; $i < count($stuans_return_terms); $i++) {
                $stu_ans_terms[$i] = $stuans_return_terms[$i]['term'];
                $stu_ans_terms_tag[$i] = $stuans_return_terms[$i]['tag'];
            }
            for ($i = 0; $i < count($expect_return_terms); $i++) {
                $expect_ans[$i] = $expect_return_terms[$i]['term'];
                $expect_ans_tag[$i] = $expect_return_terms[$i]['tag'];
            }
            $common_words = array_unique(array_intersect($stu_ans_terms, $expect_ans));
            for ($i = 0; $i < count($common_words); $i++) {
                $a = array_search($common_words[$i], $expect_ans);
                $common_words_tag[$i] = $expect_ans_tag[$a];
            }
            $common_N = array_keys($common_words_tag, 'N');
            $common_Vi = array_keys($common_words_tag, 'Vi');
            $common_Vt = array_keys($common_words_tag, 'Vt');
            $common_ADV = array_keys($common_words_tag, 'ADV');
            $common_ADJ = array_keys($common_words_tag, 'ADJ');
            $common_ASP = array_keys($common_words_tag, 'ASP');
            $common_DET = array_keys($common_words_tag, 'DET');
            $common_M = array_keys($common_words_tag, 'M');
            $common_words_num = count($common_N) + count($common_Vi) + count($common_Vt) + count($common_ADV) + count($common_ADJ) + count($common_ASP) + count($common_DET) + count($common_M);
            //-----計算CONTENT WORDS-----//
            $N_a = array_keys($stu_ans_terms_tag, 'N');
            $N_b = array_keys($expect_ans_tag, 'N');
            $Vi_a = array_keys($stu_ans_terms_tag, 'Vi');
            $Vi_b = array_keys($expect_ans_tag, 'Vi');
            $Vt_a = array_keys($stu_ans_terms_tag, 'Vt');
            $Vt_b = array_keys($expect_ans_tag, 'Vt');
            $ADV_a = array_keys($stu_ans_terms_tag, 'ADV');
            $ADV_b = array_keys($expect_ans_tag, 'ADV');
            $ADJ_a = array_keys($stu_ans_terms_tag, 'ADJ');
            $ADJ_b = array_keys($expect_ans_tag, 'ADJ');
            $ASP_a = array_keys($stu_ans_terms_tag, 'ASP');
            $ASP_b = array_keys($expect_ans_tag, 'ASP');
            $DET_a = array_keys($stu_ans_terms_tag, 'DET');
            $DET_b = array_keys($expect_ans_tag, 'DET');
            $M_a = array_keys($stu_ans_terms_tag, 'M');
            $M_b = array_keys($expect_ans_tag, 'M');
            $N_num = count($N_a) + count($N_b);
            $Vt_num = count($Vt_a) + count($Vt_b);
            $Vi_num = count($Vi_a) + count($Vi_b);
            $ADV_num = count($ADV_a) + count($ADV_b);
            $ADJ_num = count($ADJ_a) + count($ADJ_b);
            $ASP_num = count($ASP_a) + count($ASP_b);
            $DET_num = count($DET_a) + count($DET_b);
            $M_num = count($M_a) + count($M_b);
            $contentwords_num = $N_num + $Vi_num + $Vt_num + $ADV_num + $ADJ_num + $ASP_num + $DET_num + $M_num;
            $contentword_overlap = (2 * $common_words_num) / $contentwords_num;

            return $contentword_overlap;
        }catch (\Exception $e){
            //dd('contentword_overlap '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }

    private function word_MED($A, $B)
    {
        try{
        //-----Local-----//
        $total = 0;
        $minimal = $this->min_edit_distance($A, $B);
        $total = $total + $minimal;
        $MED_local = $total;

        return $MED_local;
        }catch (\Exception $e){
            //dd('word_MED '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }

    }

    private function parts_of_speech_MED($stuans_return_terms, $expect_return_terms)
    {
        try{
            for ($i = 0; $i < count($expect_return_terms); $i++) {
                $expect_ans_tag[$i] = $expect_return_terms[$i]['tag'];
            }
            for ($i = 0; $i < count($stuans_return_terms); $i++) {
                $stu_ans_tag[$i] = $stuans_return_terms[$i]['tag'];
            }
            $parts_of_speech_MED = $this -> min_edit_distance($expect_ans_tag, $stu_ans_tag);

            return $parts_of_speech_MED;
        }catch (\Exception $e){
            //dd('parts_of_speech_MED '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }


    private function document_sim($txt_vector_1, $txt_vector_2)
    {
        try{
            $document_document_dot = 0;
            $similarity = 0 ;
            $doc_vector_1 = $txt_vector_1['text_vector'];
            $doc_vector_2 = $txt_vector_2['text_vector'];
            for ($i = 1; $i <= count($doc_vector_1); $i++) {
                $c[$i] = $doc_vector_1[$i] * $doc_vector_2[$i];
            }
            $document_document_dot = array_sum($c);
            if($document_document_dot > 0)
            {
                $similarity = $document_document_dot / ($txt_vector_1['text_vector_length'] * $txt_vector_2['text_vector_length']);
            }

            return $similarity;
        }catch (\Exception $e){
            //dd('document_sim '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }


    private function sentence_parser($stu_response, $user_id)
    {
        $path = base_path('segmentation');
        $response = mb_convert_encoding($stu_response, "big5", "utf-8");
        $filename = $path .'/'  . $user_id . "/input/document.txt";
        $ckipjar = $path .'/'  . $user_id . "/CkipClient.jar";
        $ckipsockets = $path .'/'  . $user_id . "/ckipsocket.propeties";
        $inputfilename = $path .'/'  . $user_id . "/input";
        $outputfilename = $path .'/'  . $user_id . "/output";
        $fp = fopen($filename, "w");
        fputs($fp, $response);
        fclose($fp);
        exec("java -jar $ckipjar $ckipsockets $inputfilename $outputfilename");
        $str = file_get_contents($path .'/'  . $user_id . "/output/document.txt");
        $content = mb_convert_encoding($str, "utf-8", "big5");

        return $content;
    }


    private function sentence_revise($error_return_terms)
    {
        try{
            $num = 0;
            for ($i = 0; $i < count($error_return_terms); $i++) {
                $error_ans_sentence[$num] = $error_return_terms[$i]['term'];
                $error_ans_sentence[$num + 1] = "(" . $error_return_terms[$i]['tag'] . ")";
                $num = $num + 2;
            }
            $error_ans_sentence = $this -> parts_of_speech_change($error_ans_sentence);
            $error_ans_new = '';
            for ($i = 0; $i < count($error_ans_sentence); $i++) {
                $error_ans_new = $error_ans_new . $error_ans_sentence[$i];
            }
            $error_ans_new = $this -> words_segmentation($error_ans_new);
            $error_ans_term = explode(",", $error_ans_new);

            return $error_ans_term;
        }catch (\Exception $e){
            //dd('sentence_revise '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }


    private function syntax_sim($fore, $later)
    {
        try{
            array_pop($fore);
            array_pop($later);
            $unique_word = array_unique($fore);
            $a = array_count_values($fore);
            $b = array_count_values($later);
            for ($i = 0; $i < count($unique_word); $i++) {
                if(isset($unique_word[$i])){
                    $term = $unique_word[$i];
                }else{
                    $term = 0;
                }
                $common_nodes[$i] = min(count(array_keys($later, $term)), count(array_keys($fore, $term)));
            }

            $simpair = array_sum($common_nodes) / (count($fore) + count($later) - array_sum($common_nodes));

            return $simpair;

        }catch (\Exception $e){
            //dd('syntax_sim '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }


    private function min_edit_distance($A, $B)
    {
        try{
            if ($A[0] == $B[0]) {
                $aaa[0][0] = 0;
            } else {
                $aaa[0][0] = 1;
            }
            for ($i = 1; $i < count($A); $i++) {
                if ($A[$i] == $B[0]) {
                    $aaa[0][$i] = $aaa[0][$i - 1];
                } else {
                    $aaa[0][$i] = $aaa[0][$i - 1] + 1;
                }
            }
            for ($i = 1; $i < count($B); $i++) {
                if ($A[0] == $B[$i]) {
                    $aaa[$i][0] = $aaa[$i - 1][0];
                } else {
                    $aaa[$i][0] = $aaa[$i - 1][0] + 1;
                }
            }
            for ($i = 1; $i < count($A); $i++) {
                for ($j = 1; $j < count($B); $j++) {
                    if ($A[$i] == $B[$j]) {
                        $x[0] = $aaa[$j - 1][$i - 1];
                        $x[1] = $aaa[$j - 1][$i];
                        $x[2] = $aaa[$j][$i - 1];
                        $aaa[$j][$i] = min($x);
                    } else {
                        $x[0] = $aaa[$j - 1][$i - 1];
                        $x[1] = $aaa[$j - 1][$i];
                        $x[2] = $aaa[$j][$i - 1];
                        $aaa[$j][$i] = min($x) + 1;
                    }
                }
            }
            $minimal = $aaa[count($B) - 1][count($A) - 1] / (max(count($A), count($B)));

            return $minimal;
        }catch (\Exception $e){
            //dd('min_edit_distance '.$e->getMessage());
            return array(
                'type' => 'no_match',
                'jump' => '',
            );
        }
    }
}
