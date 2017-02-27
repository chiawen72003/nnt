<?php

namespace App\Http\Providers;

use App\Http\Models\QuestionsItem;

class Semantic
{
    private $max_value = -1;
    private $item_data = null;
    private $input_data = array(
        'student_ans' => null,
        'item_id' => null,
    );

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
        if ($this->input_data['item_id'] AND $this->input_data['student_ans'] AND $this->item_data) {
            $right_ans = json_decode($this->item_data['correct_answer']);
            $error_ans = json_decode($this->item_data['error_answer']);
            $ckipclient_obj = new Ckipclient();
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
            $parser_text_stu = $this->sentence_parser_stu($stu_ans, $user_id);   //學生答案 BayesianTest/segmentation.php
            $parser_text_stu = $this->parser_process($parser_text_stu);//BayesianTest/segmentation.php
            $document_stu = str_replace('(', ',', $parser_text_stu);
            $document_stu = str_replace(':', ',', $document_stu);
            $document_stu = str_replace(')', ',', $document_stu);
            $stu_doc = explode(",", $document_stu);
            $num = 0;
            for ($j = 0; $j < count($stu_doc); $j++) {
                if (preg_match("/[\x{4e00}-\x{9fa5}]/u", $stu_doc[$j])) {
                } else {
                    $stu_nodes[$num] = $stu_doc[$j];
                    $num++;
                }
            }
            for ($x = 0; $x < (count($right_ans) - 1); $x++) {           //---與預期答案比對---//
                $sentence2 = $right_ans[$x];
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
                $parser_text_ans = $this->sentence_parser($sentence2, $user_id);//BayesianTest/segmentation.php   //學生答案
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
                switch ($unit_id) {                      //不同單元使用不同的參數與公式
                    case '020010801':
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.85;
                        break;
                    case '019010801':
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.85;
                        break;
                    case '020010802':
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.82;
                        break;
                    case '019010802':
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.82;
                        break;
                    case '020010803':
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.83;
                        break;
                    case '019010803':
                        //$getValue=(0.25*$contentword_overlap_value+0.25*$getValue+0.25*$word_med+0.25*$syntax_similarity);
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.83;
                        break;
                    case '020010804':
                        //$getValue=(0.25*$contentword_overlap_value+0.25*$getValue+0.25*$word_med+0.25*$syntax_similarity);
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.83;
                        break;
                    case '019010804':
                        //$getValue=(0.25*$contentword_overlap_value+0.25*$getValue+0.25*$word_med+0.25*$syntax_similarity);
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.83;
                        break;
                    case '020010805':
                        //$getValue=(0.25*$contentword_overlap_value+0.25*$getValue+0.25*$word_med+0.25*$syntax_similarity);
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.83;
                        break;
                    case '019010805':
                        //$getValue=(0.25*$contentword_overlap_value+0.25*$getValue+0.25*$word_med+0.25*$syntax_similarity);
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.83;
                        break;
                    case '019010901':
                        //$getValue=(0.25*$contentword_overlap_value+0.25*$getValue+0.25*$word_med+0.25*$syntax_similarity);
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.80;
                        break;
                    case '019010902':
                        //$getValue=(0.25*$contentword_overlap_value+0.25*$getValue+0.25*$word_med+0.25*$syntax_similarity);
                        $getValue = (0.4 * $contentword_overlap_value + 0.3 * $getValue + 0.3 * $syntax_similarity);
                        $threshold = 0.80;
                        break;
                }
                //      echo "調整後=".$getValue."<br>";
                if ($getValue > $max_value) {
                    $max_value = $getValue;
                    $return_value = $right_ans[$x];
                }

            }
            //跟預期答案做比對後，與各單元的權重做比對，超過就代表找到正確答案，沒有超過就針對錯誤答案做分析
            if ($max_value > $threshold) {
                $at_stu_answer_sol = 1;
                //$selected_item_at = $response_at[$_SESSION['selected_item']][$at_stu_answer_sol];
                $selected_item_at_all = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][$at_stu_answer_sol]);
                $selected_item_at = $selected_item_at_all[0];

            } else {
                switch ($unit_id) {
                    case '020010801':
                        $bug1_threshold = 0.48;
                        $bug1_threshold2 = 0.55;
                        $bug1_threshold3 = 0.52;
                        $bug3_threshold = 0.5;
                        $bug4_threshold = 0.5;
                        $bug2_threshold = 0.6;
                        $bug5_threshold = 0.5;
                        $bug6_threshold = 0.5;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '019010801':
                        $bug1_threshold = 0.48;
                        $bug1_threshold2 = 0.55;
                        $bug1_threshold3 = 0.52;
                        $bug3_threshold = 0.5;
                        $bug4_threshold = 0.5;
                        $bug2_threshold = 0.6;
                        $bug5_threshold = 0.5;
                        $bug6_threshold = 0.5;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '020010802':
                        $bug1_threshold = 0.49;
                        $bug1_threshold2 = 0.56;
                        $bug1_threshold3 = 0.53;
                        $bug3_threshold = 0.5;
                        $bug4_threshold = 0.5;
                        $bug2_threshold = 0.75;
                        $bug5_threshold = 0.5;
                        $bug6_threshold = 0.5;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '019010802':
                        $bug1_threshold = 0.49;
                        $bug1_threshold2 = 0.56;
                        $bug1_threshold3 = 0.53;
                        $bug3_threshold = 0.5;
                        $bug4_threshold = 0.5;
                        $bug2_threshold = 0.75;
                        $bug5_threshold = 0.5;
                        $bug6_threshold = 0.5;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '020010803':
                        $bug1_threshold = 0.45;
                        $bug1_threshold2 = 0.56;
                        $bug1_threshold3 = 0.52;
                        $bug3_threshold = 0.4;
                        $bug4_threshold = 0.4;
                        $bug2_threshold = 0.6;
                        $bug5_threshold = 0.4;
                        $bug6_threshold = 0.4;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '019010803':
                        $bug1_threshold = 0.45;
                        $bug1_threshold2 = 0.56;
                        $bug1_threshold3 = 0.52;
                        $bug3_threshold = 0.4;
                        $bug4_threshold = 0.4;
                        $bug2_threshold = 0.6;
                        $bug5_threshold = 0.4;
                        $bug6_threshold = 0.4;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '020010804':
                        $bug1_threshold = 0.3;
                        $bug1_threshold2 = 0.48;
                        $bug1_threshold3 = 0.35;
                        $bug3_threshold = 0.3;
                        $bug4_threshold = 0.3;
                        $bug2_threshold = 0.3;
                        $bug5_threshold = 0.3;
                        $bug6_threshold = 0.3;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '019010804':
                        $bug1_threshold = 0.3;
                        $bug1_threshold2 = 0.48;
                        $bug1_threshold3 = 0.4;
                        $bug3_threshold = 0.3;
                        $bug4_threshold = 0.3;
                        $bug2_threshold = 0.3;
                        $bug5_threshold = 0.3;
                        $bug6_threshold = 0.3;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '020010805':
                        $bug1_threshold = 0.45;
                        $bug1_threshold2 = 0.56;
                        $bug1_threshold3 = 0.52;
                        $bug3_threshold = 0.4;
                        $bug4_threshold = 0.4;
                        $bug2_threshold = 0.6;
                        $bug5_threshold = 0.4;
                        $bug6_threshold = 0.4;
                        $content_par = 0.4;
                        $lsa_par = 0.3;
                        $syntax_pay = 0.3;
                        break;
                    case '019010805':
                        $bug1_threshold = 0.45;
                        $bug1_threshold2 = 0.56;
                        $bug1_threshold3 = 0.52;
                        $bug3_threshold = 0.4;
                        $bug4_threshold = 0.4;
                        $bug2_threshold = 0.6;
                        $bug5_threshold = 0.4;
                        $bug6_threshold = 0.4;
                        $content_par = 0.4;
                        $lsa_par = 0.2;
                        $syntax_pay = 0.4;
                        break;
                    case '019010901':
                        $content_par = 0.4;
                        $lsa_par = 0.2;
                        $syntax_pay = 0.4;
                        break;
                    case '019010902':
                        $content_par = 0.4;
                        $lsa_par = 0.2;
                        $syntax_pay = 0.4;
                        break;
                }

                $stu_ans = $InputCode_at[3];
                $max_value = -1; //初始 max_value
                $getValue = 0;
                $return_value = "";
                $at_stu_answer_sol = 0;
                $at_expection_error = explode("@XX@", $at_error);  //-----錯誤bug
                //  print_r($at_expection_error);
                $sentence_num = (count($at_expection_error));
                if ($stu_ans == null) {
                    $return_bug = 'bug500';
                } else {
                    for ($sen_num = 0; $sen_num < $sentence_num; $sen_num = $sen_num + 2) {
                        $error_sentence = $at_expection_error[$sen_num + 1];
                        $return_text = $ckipclient_obj->send($error_sentence);      //----進行斷詞----//
                        $return_sentences = $ckipclient_obj->getSentence();
                        $error_return_terms = $ckipclient_obj->getTerm();
                        $error_ans_term = $this->sentence_revise($error_return_terms);
                        $expect_error_vector = $this->document_vector($error_ans_term);
                        $lsa = round($this->document_sim($Answer_vector, $expect_error_vector), 4);        //LSA cosine
                        $contentword_overlap_value = $this->contentword_overlap($stuans_return_terms, $error_return_terms);     //---content words overlap---//
                        //-----中文句子剖析處理-----//
                        $parser_text_ans = $this->sentence_parser($error_sentence, $user_id);   //學生答案
                        $parser_text_ans = $this->parser_process($parser_text_ans);
                        $parser_text_ans = str_replace('(', ',', $parser_text_ans);
                        $parser_text_ans = str_replace(':', ',', $parser_text_ans);
                        $parser_text_ans = str_replace(')', ',', $parser_text_ans);
                        $ans_doc = explode(",", $parser_text_ans);
                        $num = 0;
                        for ($j = 0; $j < count($ans_doc); $j++) {
                            if (preg_match("/[\x{4e00}-\x{9fa5}]/u", $ans_doc[$j])) {
                            } else {
                                $ans_nodes[$num] = $ans_doc[$j];
                                $num++;
                            }
                        }
                        $syntax_similarity = $this->syntax_sim($stu_nodes, $ans_nodes);
                        $getValue = $content_par * $contentword_overlap_value + $lsa_par * $lsa + $syntax_par * $syntax_similarity;
                        //   echo '句子:'.$error_sentence.'<br>';
                        //   echo 'bug matach score:'.$getValue.'<br>';
                        if ($getValue > $max_value and $getValue > 0.5) {
                            $max_value = $getValue;
                            $return_bug = $at_expection_error[$sen_num];
                            //echo $return_bug.'<br>';
                        } else {
                            $return_bug = 'bug500';
                        }
                    }
                }
                $at_stu_bug_type = $return_bug . _SPLIT_SYMBOL;
                $_SESSION['$at_stu_bug_type'] = $at_stu_bug_type;
                $at_error_block = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][$at_stu_answer_sol]);
                $return_key = array_search($return_bug, $at_error_block);
                $selected_item_at = $at_error_block[$return_key + 1];
                $at_stu_bug_type = $return_bug . _SPLIT_SYMBOL;
                $_SESSION['$at_stu_bug_type'] = $at_stu_bug_type;
                $at_error_block = explode(_SPLIT_SYMBOL, $response_at[$_SESSION['selected_item']][$at_stu_answer_sol]);
                $return_key = array_search($return_bug, $at_error_block);
                $selected_item_at = $at_error_block[$return_key + 1];
            }
        }
    }


    private function parts_of_speech_change($word)
    {
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(M)' and $word[$i + 6] == '(N)') {
                $word[$i + 2] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(DET)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(M)' and $word[$i + 6] == '(N)') {
                $word[$i + 2] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(Vt)' and $word[$i + 6] == '(Vi)') {
                $word[$i + 2] = '(ADJ)';
                $word[$i + 6] = '(N)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vi)' and $word[$i + 2] == '(Vt)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                $word[$i] = '(ADJ)';
                $word[$i + 2] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vi)' and $word[$i + 2] == '(N)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                $word[$i] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(Vi)') {
                $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                $word[$i + 2] = '(ADJ)';
                unset($word[$i + 3]);
                unset($word[$i + 4]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vi)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)' and $word[$i + 6] == '(Vi)') {
                $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                $word[$i] = '(ADJ)';
                $word[$i + 6] = '(ADJ)';
                unset($word[$i + 1]);
                unset($word[$i + 2]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                $word[$i + 2] = '(ADJ)';
                unset($word[$i + 3]);
                unset($word[$i + 4]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vi)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)') {
                $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                $word[$i] = '(ADJ)';
                unset($word[$i + 2]);
                unset($word[$i + 1]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vt)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)') {
                $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                $word[$i] = '(ADJ)';
                unset($word[$i + 2]);
                unset($word[$i + 1]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(N)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(N)') {
                $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                $word[$i] = '(ADJ)';
                unset($word[$i + 2]);
                unset($word[$i + 1]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(M)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(N)') {
                $word[$i + 2] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vt)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(N)') {
                $word[$i + 2] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vt)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(Vt)') {
                $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                $word[$i] = '(ADV)';
                unset($word[$i + 2]);
                unset($word[$i + 1]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vi)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(Vt)') {
                $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                $word[$i] = '(ADV)';
                unset($word[$i + 2]);
                unset($word[$i + 1]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(N)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(Vt)') {
                $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                $word[$i + 2] = '(ADV)';
                unset($word[$i + 4]);
                unset($word[$i + 3]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(N)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(Vi)') {
                $word[$i + 1] = $word[$i + 1] . $word[$i + 3];
                $word[$i + 2] = '(ADV)';
                unset($word[$i + 4]);
                unset($word[$i + 3]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vt)' and $word[$i + 2] == '(T)' and $word[$i + 4] == '(Vi)') {
                $word[$i - 1] = $word[$i - 1] . $word[$i + 1];
                $word[$i] = '(ADV)';
                unset($word[$i + 2]);
                unset($word[$i + 1]);
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(ADV)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(T)') {
                $word[$i + 2] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vi)' and $word[$i + 2] == '(Vi)' and $word[$i + 4] == '(Vt)') {
                $word[$i + 2] = '(ADV)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(Vi)' and $word[$i + 2] == '(N)') {
                $word[$i] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(N)' and $word[$i + 2] == '(Vi)') {
                $word[$i + 2] = '(ADJ)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(N)' and $word[$i + 2] == '(ADJ)' and $word[$i + 4] == '(T)' and $word[$i + 6] == '(N)') {
                $word[$i + 2] = '(Vt)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(P)' and $word[$i + 2] == '(N)' and $word[$i + 4] == '(N)' and $word[$i + 6] == '(ADJ)') {
                $word[$i + 6] = '(Vi)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(P)' and $word[$i + 2] == '(N)' and $word[$i + 4] == '(ADJ)') {
                $word[$i + 4] = '(Vi)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(N)' and $word[$i + 2] == '(ADJ)' and $word[$i + 4] == '(P)') {
                $word[$i + 2] = '(Vi)';
            }
        }
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == '(N)' and $word[$i + 2] == '(ADJ)' and $word[$i + 4] == '(ASP)') {
                $word[$i + 2] = '(Vi)';
            }
        }
        $new_word = array_values($word);
        unset($new_word[count($new_word) - 1]);

        return $new_word;
    }

    private function words_segmentation($new_txt)
    {
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
    }

    /**
     *
     * @param $str
     * @return mixed
     */
    private function document_vector($str)
    {
        /** todo 需要改拉資料庫 **/
        $dimension = 300;
        $word = array_values(array_unique($str));
        $a = array_count_values($word);
        $document_vector = array();
        $vector = array();
        for ($i = 0; $i < count($word); $i++) {
            mysql_query('SET NAMES utf8');                    // 解決網頁顯示中文字是亂碼
            mysql_query('SET CHARACTER_SET_CLIENT=utf8');     // 解決網頁顯示中文字是亂碼
            mysql_query('SET CHARACTER_SET_RESULTS=utf8');    // 解決網頁顯示中文字是亂碼
            $sql = "SELECT * from lsa_term WHERE word = binary '$word[$i]' ";
            $result = mysql_query($sql) or die("無法執行SQL");
            $row = mysql_fetch_array($result);
            $num = mysql_num_rows($result);
            $term_id = $row['id'];
            $term = $word[$i];
            $sql_u = "SELECT * from lsa_u WHERE id='$term_id' ";
            $result2 = mysql_query($sql_u) or die("無法執行SQL2");
            $row2 = mysql_fetch_row($result2);
            //  echo log($a[$term]+1)*$row['global_weight']*$row2[2]."<br>";
            for ($k = 1; $k <= $dimension; $k++) {
                $vector[$k][$i] = log($a[$term] + 1) * $row['global_weight'] * $row2[$k];
            }
        }
        $b = 0;
        //   print_r($vector[1])."<br>";
        //   echo array_sum($vector[1])."<br>";
        for ($k = 1; $k <= $dimension; $k++) {
            $document_vector[$k] = array_sum($vector[$k]);
            $c = $document_vector[$k] * $document_vector[$k];
            $b = $b + $c;
        }
        // print_r($document_vector);
        $txt_vector_length = sqrt($b);
        $txt_vector['text_vector'] = $document_vector;
        $txt_vector['text_vector_length'] = $txt_vector_length;

        return $txt_vector;
    }

    /**
     *
     *
     * @param $stu_response
     * @param $user_id
     * @return mixed|string
     */
    private function sentence_parser_stu($stu_response, $user_id)
    {
        /**todo 需要檢查這方法到底在做啥？ **/
        $response = mb_convert_encoding($stu_response, "big5", "utf-8");
        $filename = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/input/stuans.txt";
        $ckipjar = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/CkipClient.jar";
        $ckipsockets = "user/" . $user_id . "//ckipsocket.propeties";
        $inputfilename = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/input";
        $outputfilename = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/output";
        $fp = fopen($filename, "w");
        fputs($fp, $response);
        fclose($fp);
        exec("java -jar $ckipjar $ckipsockets $inputfilename $outputfilename");
        $str = file_get_contents("D:/xampp/htdocs/ReadCO/user//" . $user_id . "/output/stuans.txt");
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
        //print_r($common_words)."<br>";

        //echo array_search('一方面',$expect_ans)."<br>";
        for ($i = 0; $i < count($common_words); $i++) {
            $a = array_search($common_words[$i], $expect_ans);
            $common_words_tag[$i] = $expect_ans_tag[$a];
        }
        //print_r($common_words_tag)."<br>";
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
        //echo $contentwords_num."<br>";
        $contentword_overlap = (2 * $common_words_num) / $contentwords_num;

        return $contentword_overlap;
    }

    private function word_MED($A, $B)
    {
        //-----Local-----//
        $total = 0;
        $minimal = $this->min_edit_distance($A, $B);
        $total = $total + $minimal;
        $MED_local = $total;
        return $MED_local;
    }

    private function parts_of_speech_MED($stuans_return_terms, $expect_return_terms)
    {
        //-----Local-----//
        for ($i = 0; $i < count($expect_return_terms); $i++) {
            $expect_ans_tag[$i] = $expect_return_terms[$i]['tag'];
        }
        for ($i = 0; $i < count($stuans_return_terms); $i++) {
            $stu_ans_tag[$i] = $stuans_return_terms[$i]['tag'];
        }
        $parts_of_speech_MED = $this -> min_edit_distance($expect_ans_tag, $stu_ans_tag);
        return $parts_of_speech_MED;
    }


    private function document_sim($txt_vector_1, $txt_vector_2)
    {
        $document_document_dot = 0;
        $doc_vector_1 = $txt_vector_1['text_vector'];
        $doc_vector_2 = $txt_vector_2['text_vector'];
        for ($i = 1; $i <= count($doc_vector_1); $i++) {
            $c[$i] = $doc_vector_1[$i] * $doc_vector_2[$i];
        }
        $document_document_dot = array_sum($c);
        $similarity = $document_document_dot / ($txt_vector_1['text_vector_length'] * $txt_vector_2['text_vector_length']);
        return $similarity;
    }


    private function sentence_parser($stu_response, $user_id)
    {
        $response = mb_convert_encoding($stu_response, "big5", "utf-8");
        $filename = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/input/document.txt";
        $ckipjar = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/CkipClient.jar";
        $ckipsockets = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/ckipsocket.propeties";
        $inputfilename = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/input";
        $outputfilename = "D:/xampp/htdocs/ReadCO/user//" . $user_id . "/output";
        $fp = fopen($filename, "w");
        fputs($fp, $response);
        fclose($fp);
        exec("java -jar $ckipjar $ckipsockets $inputfilename $outputfilename");
        $str = file_get_contents("D:/xampp/htdocs/ReadCO/user//" . $user_id . "/output/document.txt");
        $content = mb_convert_encoding($str, "utf-8", "big5");

        return $content;
    }


    private function sentence_revise($error_return_terms)
    {
        $num = 0;
        for ($i = 0; $i < count($error_return_terms); $i++) {
            $error_ans_sentence[$num] = $error_return_terms[$i]['term'];
            $error_ans_sentence[$num + 1] = "(" . $error_return_terms[$i]['tag'] . ")";
            $num = $num + 2;
        }
        $error_ans_sentence = parts_of_speech_change($error_ans_sentence);
        $error_ans_new = '';
        for ($i = 0; $i < count($error_ans_sentence); $i++) {
            $error_ans_new = $error_ans_new . $error_ans_sentence[$i];
        }
        $error_ans_new = words_segmentation($error_ans_new);
        $error_ans_term = explode(",", $error_ans_new);

        return $error_ans_term;
    }


    private function syntax_sim($fore, $later)
    {
        array_pop($fore);
        array_pop($later);
        $unique_word = array_unique($fore);
        $a = array_count_values($fore);
        $b = array_count_values($later);
        for ($i = 0; $i < count($unique_word); $i++) {
            $term = $unique_word[$i];
            $common_nodes[$i] = min(count(array_keys($later, $term)), count(array_keys($fore, $term)));
        }
        $simpair = array_sum($common_nodes) / (count($fore) + count($later) - array_sum($common_nodes));

        return $simpair;
    }


    private function min_edit_distance($A, $B)
    {
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
    }
}