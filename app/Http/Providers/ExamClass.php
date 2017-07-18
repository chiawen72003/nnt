<?php

namespace App\Http\Providers;

use App\Http\Models\ExamPaper;
use App\Http\Models\ExamRecord;
use App\Http\Models\QuestionsItem;
use App\Http\Providers\QuestionsItemClass;
use App\Http\Providers\ExamRecordClass;
use App\Http\Models\UnitList;
use App\Http\Models\Subject;
use App\Http\Providers\ExamPaperAccessClass;
class ExamClass
{
    const _SPLIT_SYMBOL = '@XX@';
    private $use_data = array(
        'url_path' => 'http://210.240.188.161/chineseautotutor/Single_Agent_test_show_1115.php?',
        'paper_id' => null,
        'cs_id' => null,
        'paper_vol' => null,
        'item_num' => null,
        'InputCode' => null,//學生輸入的答案
        'at_error' => null,//試題錯誤答案的集合
        'at_answer' => null,//試題正確答案的集合
        'unit_id' => null,//單元id
        'item_id' => null,//試題id
    );

    public function __construct()
    {

    }

    public function init($set_data = array())
    {
        foreach ($set_data as $key => $value) {
            $this -> use_data[$key] = $value;
        }
    }

    /**
     * 取得受測學生可以測驗的單元
     *
     * @param Array $mem_data 學生個人資料
     *
     * @return Array $list_data 可測驗的單元資料
     */
    public  function get_exam_unit_list($mem_data)
    {
        $list_data = array();
        $has_test_data = array();//已經受測過得單元
        $access_data = array();
        $can_test_data = null;

        //根據學生的班級資料取得可受測的試卷資料
        $access_obj = new ExamPaperAccessClass();
        $access_obj -> init(
            array(
                'organization_id' => $mem_data['organization_id'],
                'grade' => $mem_data['grade'],
                'class' => $mem_data['class'],
            )
        );
        $t_data = $access_obj -> get_exampaperaccess_data();
        foreach($t_data as $v)
        {
            $access_data[] = $v['exam_paper_id'];
        }
        if(count($access_data) > 0)
        {
            $can_test_data = $access_data;
            //根據試卷id取得單元id
            $paper_obj = new ExamPaperClass();
            $paper_obj ->init(
                array('id' => $can_test_data)
            );
            $unit_id = $paper_obj->get_unit_id();
            $temp_obj = UnitList::whereIn('id', $unit_id)
            ->get();
            foreach ($temp_obj as $value) {
                $list_data[] = $value;
            }
        }

        return $list_data;
    }

    /**
     * 取得指定單元下可以受測的試卷
     *
     * @param Array $mem_data 學生個人資料
     *
     * @return Array $list_data 可測驗的試卷資料
     */
    public  function get_exam_paper_list($mem_data, $unit_id)
    {
        $list_data = array();
        $has_test_data = array();//已經受測過得單元
        $access_data = array();
        $can_test_data = null;

        //根據學生的班級資料取得可受測的試卷資料
        $access_obj = new ExamPaperAccessClass();
        $access_obj -> init(
            array(
                'organization_id' => $mem_data['organization_id'],
                'grade' => $mem_data['grade'],
                'class' => $mem_data['class'],
            )
        );
        $t_data = $access_obj -> get_exampaperaccess_data();
        foreach($t_data as $v)
        {
            $access_data[] = $v['exam_paper_id'];
        }
        if(count($access_data) > 0)
        {
            $can_test_data = $access_data;
            //根據試卷id取得單元id
            $paper_obj = new ExamPaperClass();
            $paper_obj ->init(
                array(
                    'id' => $can_test_data,
                    'unit_list_id' => $unit_id,
                )
            );
            $list_data = $paper_obj->get_exampaper();
        }

        return $list_data;
    }


    /**
     * 取得試題item的資料
     *
     */
    public  function get_exam_item_data()
    {
        $item_sn = null;
        $publisher_id = null;
        $return_data = array(
            'id' => $this -> use_data['item_id'],
            'title' => null,
            'correct_answer' => null,
            'error_answer' => null,
            'load_module' => null,
            'iframe_path' => '',
        );
        $t = QuestionsItem::where('questions_item.id', $this -> use_data['item_id'])
            ->leftJoin('model_item', 'model_item.id', '=', 'questions_item.model_item_id')
            ->select(
                'questions_item.title',
                'questions_item.correct_answer',
                'questions_item.error_answer',
                'questions_item.model_item_options',
                'questions_item.avatar_type',
                'questions_item.avatar_dsc',
                'model_item.file_name'
            )
            ->get();
        foreach ($t as $v){
            $return_data['title'] = $v['title'];
            $correct_answer = json_decode($v['correct_answer'],true);
            $return_data['correct_answer']['answer'] = $correct_answer[0]['answer'];
            $return_data['correct_answer']['jump'] = $correct_answer[1]['jump'];
            $return_data['correct_answer']['keyword'] = $correct_answer[2]['keyword'];
            $error_answer = json_decode($v['error_answer'],true);
            $return_data['error_answer']['answer'] = $error_answer[0]['answer'];
            $return_data['error_answer']['jump'] = $error_answer[1]['jump'];
            $return_data['error_answer']['number'] = $error_answer[2]['number'];
            $return_data['error_answer']['keyword'] = $error_answer[3]['keyword'];
            $return_data['load_module'] = $v['file_name'];
            $return_data['model_item_options'] = json_decode($v['model_item_options'],true);
            $return_data['iframe_path'] = $this -> get_iframe_path($v['avatar_type'], $v['avatar_dsc']);
        }

        return $return_data;
    }

	/**
	* 組合電腦代理人的網址
	*
    * @param  $avatar_type 代理人頭像的編號，單代理人一筆資料，雙代理人兩筆資料
    * @param  $avatar_dsc 代理人對話資料
	*/
    public  function get_iframe_path($avatar_type, $avatar_dsc)
    {
        $avatar = json_decode($avatar_type, true);
        $avatar_dsc = json_decode($avatar_dsc, true);
        $url_path = $this -> use_data['url_path'];
       //單代理人
       if (count($avatar) == 1) {
           $url_path .= 'text7=ss121419';
           $url_path .= '&agent_role=Char'.$avatar[0];
           $url_path .= '&text1='.urlencode($avatar_dsc[1]['dsc'][0]);
           $url_path .= '&text2='.urlencode($avatar_dsc[1]['dsc'][1]);
           $url_path .= '&text3='.urlencode($avatar_dsc[1]['dsc'][2]);
           $url_path .= '&select=char2&select2=char2&select3=char2';
       }
       /*
       //多代理人
       if ($publisher_id == 20) {
           $url_path .= $feedback_order_url . $feedback_talk_url . '&text7=MAT_' . $this -> use_data['cs_id'] . sprintf("%02d", $this -> use_data['paper_vol']) . "_" . $selected_item;
       }
       //雙代理人
       if ($publisher_id == 21) {
           $url_path .= $feedback_order_url . $feedback_talk_url . '&text7=MAT_' . $this -> use_data['cs_id'] . sprintf("%02d", $this -> use_data['paper_vol']) . "_" . $selected_item;
       }
       */

        return $url_path;
    }


    /**
     * 取得指定試卷的試題數量
     */
    public function get_questions_item_nums($paper_obj)
    {
        $subject_list = array();
        $whereIn = array();
        foreach($paper_obj as $temp_array){
            $whereIn[] = $temp_array['id'];
        }
        if(count($whereIn) > 0){
            $t = new QuestionsItemClass();
            $t ->init(array('exam_paper_id'=>$whereIn));
            $subject_list = $t -> get_paper_item_num($whereIn);
        }

        return $subject_list;
    }

    /**
     * 取得單元列表內對應的試卷資料
     *
     *
     */
    public function get_exam_paper_data($unit_data)
    {
        $exam_list = array();
        if(is_array($unit_data)){
            $where_in = array();
            foreach ($unit_data as $value){
                if(isset($value['id'])){
                    if(!in_array($value['id'],$where_in)){
                        $where_in[] = $value['id'];
                    }
                }
            }
            if(count($where_in) > 0){
                $temp_obj = ExamPaper::whereIn('unit_list_id',$where_in)
                    ->orderBy('id','ASC')
                    ->get();
                if($temp_obj){
                    foreach ($temp_obj as $v){
                        $exam_list[$v['unit_list_id']][] = $v;
                    }
                }
            }
        }

        if(is_numeric($unit_data))
        {
            $temp_obj = ExamPaper::where('unit_list_id',$unit_data)
                ->orderBy('id','ASC')
                ->get();
            if($temp_obj){
                foreach ($temp_obj as $v){
                    $exam_list[] = $v;
                }
            }
        }

        return $exam_list;
    }

    /**
     * 取得一筆試卷資料
     *
     * @param array $return_data
     */
    public function get_exam_paper($id)
    {
        $return_data = array();
        $temp_obj = ExamPaper::select(
            'id',
            'unit_list_id',
            'unit_key',
            'paper_vol',
            'item_num',
            'title',
            'img'
        )
            ->where('id',$id)
            ->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $unit_data){
                $return_data = $unit_data->toArray();
            }
        }

        return $return_data;
    }

    /**
    * 新增一筆試卷資料
    *
    * @param array $insert_data 要新增的資料
    */
    public function exampaper_add($insert_data)
    {
        $temp_obj = new ExamPaper();
        foreach ($insert_data as $key => $value){
            $temp_obj->$key = $value;
        }
        $temp_obj->save();

        return ;
    }

    /**
     * 移除一個試卷
     *
     * @param int/string $getID 要移除單元的id
     */
    public function exampaper_delete($getID)
    {
        ExamPaper::destroy($getID);

        return ;
    }

    /**
     * 新增 操作紀錄
     *
     * @param Array $mem_data 學生個人資料
     *
     * @return Array $list_data 可測驗的單元資料
     */
    public function set_exam_record($mem_id,$inputData)
    {
        $inputData['student_id'] = $mem_id;
        $temp_obj = new ExamRecordClass();
        $temp_obj ->init($inputData);
        $temp_obj->set_record();

        return '';
    }

    /**
     * 取得指定單元下的所有試卷資料
     */
    public function get_paper_by_unit_id($unit_id){
        $return_data = array();
        $temp_obj = ExamPaper::where('unit_list_id',$unit_id)
                    ->select('id')
                    ->orderBy('id')
                    ->get();
        foreach ($temp_obj as $t){
            $return_data[] = $t['id'];
        }

        return $return_data;
    }

    /**
     * 取得試卷下的試題資料
     */
    public function get_questions_item_paper_id($paper_id){
        $return_data = array();
        $temp_obj = QuestionsItem::where('exam_paper_id',$paper_id)
            ->orderBy('id')
            ->get();
        foreach ($temp_obj as $t){
            $return_data[] = $t;
        }

        return $return_data;
    }

    /**
     *  取出一筆指定的單元操作紀錄
     */
    public  function get_exam_record($mem_id,$id)
    {
        $return_data = array();
        $temp_obj = ExamRecord::where('student_id', $mem_id)
            ->where('id',$id)
            ->select('id', 'exam_paper_id', 'record', 'use_item')
            ->get();
        foreach ($temp_obj as $t){
            $return_data['id'] = $t['id'];
            $return_data['exam_paper_id'] = $t['exam_paper_id'];
            $return_data['record'] = json_decode($t['record'],true);
            $use_item = json_decode($t['use_item'],true);
            $return_data['use_item'] = $use_item;
        }

        return $return_data;
    }

    /**
     *  取出已經學習過的科目
     */
    public  function get_record_unit_all($mem_id)
    {
        $return_data = array();
        $temp_obj = ExamRecord::
        leftJoin('exam_paper', 'exam_record.exam_paper_id', '=', 'exam_paper.id')
            ->leftJoin('unit_list', 'exam_paper.unit_list_id', '=', 'unit_list.id')
            ->where('exam_record.student_id', $mem_id)
            ->where('exam_record.is_finish', '1')
            ->select(
                'unit_list.subject'
            )
            ->groupBy('unit_list.subject')
            ->orderBy('unit_list.subject')
            ->get();
        if(count($temp_obj) > 0){
            foreach ($temp_obj as $v)
            {
                $return_data[] = $v['subject'];
            }

        }

        return $return_data;
    }

    /**
     *  取出已經學習過的試卷
     */
    public  function get_record_list_all($mem_id)
    {
        $return_data = array();
        $temp_obj = ExamRecord::
        leftJoin('exam_paper', 'exam_record.exam_paper_id', '=', 'exam_paper.id')
        ->leftJoin('unit_list', 'exam_paper.unit_list_id', '=', 'unit_list.id')
            ->where('exam_record.student_id', $mem_id)
            ->where('exam_record.is_finish', '1')
            ->select(
                'exam_paper.unit_list_id',
                'exam_paper.paper_vol',
                'exam_record.id',
                'exam_record.updated_at',
                'unit_list.subject',
                'unit_list.vol',
                'unit_list.unit',
                'unit_list.title'
            )
            ->orderBy('exam_record.created_at','DESC')
            ->get();
        if(count($temp_obj) > 0){
            $return_data = $temp_obj->toArray();
        }

        return $return_data;
    }

    /**
     *  取出指定科目內，已經學習過得單元資料
     */
    public  function get_record_list_by_subject($mem_id,$subject_id)
    {
        $return_data = array();
        $temp_obj = ExamRecord::
        leftJoin('exam_paper', 'exam_record.exam_paper_id', '=', 'exam_paper.id')
            ->leftJoin('unit_list', 'exam_paper.unit_list_id', '=', 'unit_list.id')
            ->where('exam_record.student_id', $mem_id)
            ->where('exam_record.is_finish', '1')
            ->where('unit_list.subject',$subject_id)
            ->select(
                'exam_record.updated_at',
                'exam_record.id',
                'unit_list.vol',
                'unit_list.unit',
                'exam_paper.paper_vol'
            )
            //->groupBy('unit_list.vol')
            ->orderBy('exam_record.created_at','DESC')
            ->get();
       if(count($temp_obj) > 0){
           $return_data = $temp_obj->toArray();
       }

        return $return_data;
    }
}
