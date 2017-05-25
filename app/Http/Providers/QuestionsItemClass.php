<?php

namespace App\Http\Providers;

use App\Http\Models\QuestionsItem;
use \Input;

class QuestionsItemClass
{
    private $item_data = array(
        'id' => '',
        'title' => '',
        'power_dsc' => '',
        'model_item_id' => '0',
        'model_item_options' => array(),
        'feedback_type' => '0',
        'exam_paper_id' => '0',
        'avatar_type' => array(),
        'avatar_dsc' => array(),
        'correct_answer' => array(),
        'error_answer' => array(),
        'score' => '0',
    );

    public function init($input_data)
    {
        foreach ($input_data as $key => $value) {
            $this->item_data[$key] = $value;
        }
    }

    /**
     * 取出指定試卷下的所有試題資料
     */
    public function get_questions_data()
    {
        $retunrn_array = array();
        $t_obj = QuestionsItem::where('exam_paper_id' ,$this->item_data['exam_paper_id'])
            ->orderBy('id')
            ->get();
        foreach($t_obj as $v)
        {
            $retunrn_array[] = $v->toArray();
        }

        return $retunrn_array;
    }

    /**
     * 新增一個試題資料
     *
     */
    public function add()
    {
        $add_obj = new QuestionsItem();
        $add_obj->title = $this->item_data['title'];
        $add_obj->model_item_id = $this->item_data['model_item_id'];
        $add_obj->model_item_options = json_encode($this->item_data['model_item_options']);
        $add_obj->feedback_type = $this->item_data['feedback_type'];
        $add_obj->exam_paper_id = $this->item_data['exam_paper_id'];
        $add_obj->avatar_type = json_encode($this->item_data['avatar_type']);
        $add_obj->avatar_dsc = json_encode($this->item_data['avatar_dsc']);
        $add_obj->correct_answer = json_encode($this->item_data['correct_answer']);
        $add_obj->error_answer = json_encode($this->item_data['error_answer']);
        $add_obj->power_dsc = $this->item_data['power_dsc'];
        $add_obj->save();

        //增加電腦代理人資訊
        //單代理人
        // todo 代理人資訊後續要再打開
        if (count($this->item_data['avatar_type']) == 1) {
            /*
            $url_path = "http://210.240.188.161/chineseautotutor/Single_Agent_test_show_1115.php?agent_role=Char".$_REQUEST['Head_portrait_teacher'].$feedback_talk_url.feedback_order_url."&text7=MAT_".$item->exam_paper_id."_".$item->item_num;
            echo $url_path."<br>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url_path);
            curl_exec($ch);
            curl_close($ch);
            */
        }

        //多、雙代理人
        if (count($this->item_data['avatar_type']) == 2) {
            /*
            //http://210.240.188.161/chineseautotutor/Multi_Agent_test_show.php?select=Char3&text7=TEST&text1=RERE&text2=TETE&select2=Char1&text3=&select3=Char2&text4=&select4=Char2&text5=&select5=Char2
            $url_path = "http://210.240.188.161/chineseautotutor/Multi_Agent_test_show.php.php?agent_role=Char".$feedback_talk_url.$feedback_order_url."&text7=MAT_".$item->exam_paper_id."_".$item->item_num;
            echo $url_path."<br>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url_path);
            curl_exec($ch);
            curl_close($ch);
            */
        }

        return $add_obj->id;
    }

    /**
     * 更新一個試題資料
     *
     */
    public function update_data()
    {
        $add_obj = QuestionsItem::find($this->item_data['id']);
        $add_obj->title = $this->item_data['title'];
        $add_obj->model_item_id = $this->item_data['model_item_id'];
        $add_obj->model_item_options = json_encode($this->item_data['model_item_options']);
        $add_obj->feedback_type = $this->item_data['feedback_type'];
        $add_obj->avatar_type = json_encode($this->item_data['avatar_type']);
        $add_obj->avatar_dsc = json_encode($this->item_data['avatar_dsc']);
        $add_obj->correct_answer = json_encode($this->item_data['correct_answer']);
        $add_obj->error_answer = json_encode($this->item_data['error_answer']);
        $add_obj->save();

        return $add_obj->id;
    }

    /**
     * 刪除一個試題資料
     *
     */
    public function delete_data()
    {
        $item = QuestionsItem::where('id',$this->item_data['id'])
            ->where('exam_paper_id',$this->item_data['exam_paper_id'])
            ->delete();
    }


    /**
     * 刪除指定試卷下的所有試題資料
     *
     */
    public function delete_by_exam_paper_id()
    {
        $item = QuestionsItem::where('exam_paper_id',$this->item_data['exam_paper_id'])
            ->delete();
    }


    /**
     * 取得試卷內試題的數量
     *
     */
    public function get_paper_item_num($paper_id)
    {
        $return_data = array();

        $item_obj = QuestionsItem::select('exam_paper_id')
            ->whereIn('exam_paper_id', $paper_id)
            ->orderBy('id', 'ASC')
            ->get();
        if ($item_obj) {
            foreach ($item_obj as $value) {
                if (!isset($return_data[$value['exam_paper_id']])) {
                    $return_data[$value['exam_paper_id']] = 0;
                }
                $return_data[$value['exam_paper_id']]++;
            }
        }

        return $return_data;
    }

    /**
     * 取得單一試題資料
     */
    public function get_one_item_data()
    {
        $return_data = array();

        $item_obj = QuestionsItem::select('questions_item.*','unit_list.module_type')
            ->leftJoin('exam_paper', 'exam_paper.id', '=', 'questions_item.exam_paper_id')
            ->leftJoin('unit_list', 'unit_list.id', '=', 'exam_paper.unit_list_id')
            ->where('questions_item.id', $this->item_data['id'])
            ->get();
        if ($item_obj) {
            foreach ($item_obj as $value) {
                $return_data = $value->toArray();
            }
            //部份欄位的json資料要解開
            if(isset($return_data['avatar_type']))
            {
                $return_data['avatar_type'] = json_decode($return_data['avatar_type'],true);
            }
            if(isset($return_data['avatar_dsc']))
            {
                $t = json_decode($return_data['avatar_dsc'],true);
                $return_data['avatar_dsc'] = array(
                    'type' => $t[0]['dsc_type'],
                    'dsc' => $t[1]['dsc'],
                );
            }
            if(isset($return_data['correct_answer']))
            {
                $t = json_decode($return_data['correct_answer'],true);
                $max_count = count($t[0]['answer']);
                $return_data['correct_answer'] = array();
                for($x= 0 ;$x< $max_count;$x++)
                {
                    $return_data['correct_answer'][] = array(
                        'answer' =>$t[0]['answer'][$x],
                        'jump' =>$t[1]['jump'][$x],
                        'keyword' =>$t[2]['keyword'][$x],
                    );
                }
            }
            if(isset($return_data['error_answer']))
            {
                $t = json_decode($return_data['error_answer'],true);
                $max_count = count($t[0]['answer']);
                $return_data['error_answer'] = array();
                for($x= 0 ;$x< $max_count;$x++)
                {
                    $return_data['error_answer'][] = array(
                        'answer' =>$t[0]['answer'][$x],
                        'jump' =>$t[1]['jump'][$x],
                        'number' =>$t[2]['number'][$x],
                        'keyword' =>$t[3]['keyword'][$x],
                    );
                }
            }
            if(isset($return_data['model_item_options']))
            {
                $t = json_decode($return_data['model_item_options'],true);
                $return_data['model_item_options'] = $t;
            }

        }

        //dd($return_data);

        return $return_data;
    }
}
