<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ExamClass;
use App\Http\Providers\Semantic;
use App\Http\Providers\ExamRecordClass;
use App\Http\Providers\FeedbackListClass;
use App\Http\Providers\SubjectClass;
use App\Http\Providers\MemberClass;
use App\Http\Providers\PhpExcel;

class ExamController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * 可受測的單元列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examList()
    {
        $exam_class_obj = new ExamClass();
        $subject_obj = new SubjectClass();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = $exam_class_obj -> get_exam_unit_list($data['user_data']);
        $data['subject_list'] = $subject_obj -> subject_list();
        //todo 下面要重構單元完成的方法
        //$data['exam_review_data'] = $exam_class_obj -> get_review_data($data['user_data']);

        return view('student.exam.list', $data);
    }

    /**
     * 指定單元下可受測的試卷
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examPaperList($id)
    {
        $exam_class_obj = new ExamClass();
        $subject_obj = new SubjectClass();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        //todo 確認頁面是否正常
        $data['list_data'] = $exam_class_obj -> get_exam_paper_list($data['user_data'], $id);
        $data['subject_list'] = $subject_obj -> subject_list();

        return view('student.exam.paper_list', $data);
    }

    /**
     * 受測頁面的外框部份
     *
     * 備註：所有單元測驗都會直接進來這邊
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testPage()
    {
        $paper_id = app('request')->get('paper_id');
        $exam_class_obj = new ExamClass();
        $data = array();
        $data['is_view_record'] = false;//是否為操作紀錄觀看模式
        $t = new FeedbackListClass();
        $data['feedback_list'] = $t->get_list_data();//回饋類型
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['paper_id'] = $paper_id;
        $data['questions_item_data'] = $exam_class_obj -> get_questions_item_paper_id($paper_id);
        $examrecord = new ExamRecordClass();
        $examrecord -> init(array(
            'student_id'=>app('request')->session()->get('user_data')['uid'],
            'exam_paper_id'=>$paper_id,
        ));
        $last_exam_record = $examrecord->get_one_record();
        $data['begin_paper_index'] = 0;//起始試卷的index位置
        $data['begin_item_index'] = 0;//起始試題的index位置

        if(!is_null($last_exam_record)){
            //如果已經操作完畢，就必須把紀錄重新清除在操作
            if($last_exam_record['is_finish'] == 1){
                $examrecord->set_clear_record();
                $data['begin_paper_index'] = 0;//起始試卷的index位置
                $data['begin_item_index'] = 0;//起始試題的index位置
            }else{
                $use_item = json_decode($last_exam_record['use_item'],true);
                if(is_array($use_item)){
                    foreach ($use_item as $v){
                        $data['begin_paper_index'] = $v['paper_index'];//起始試卷的index位置
                        $data['begin_item_index'] = $v['item_index'];//起始試題的index位置
                    }
                }
            }
        }

        return view('student.exam.test_page', $data);
    }

    /**
    * 受測頁面的內框部份：包含題號、標題、模組資料
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function GetModelPage()
    {
        $item_id = app('request')->get('item_id');
        $exam_class_obj = new ExamClass();
        $exam_class_obj ->init(array(
            'item_id' => $item_id,
        ));
        $data['item_num'] = 1;
        $data['exam_data'] = $exam_class_obj -> get_exam_item_data();
        $data['exam_item'] = '';
        if ($data['exam_data']['load_module'] != null) {

            $data['exam_item'] = view('student.exam.modules.'.$data['exam_data']['load_module'] ,$data);
        }

        return view('student.exam.test_page_inside', $data);
    }

    /**
     * 使用語意分析作答資料
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSemanticAnalysis()
    {
        $t_input = array(
            'student_ans' => app('request')->get('student_ans'),
            'item_id' => app('request')->get('item_id'),
            'exam_paper_id' => app('request')->get('exam_paper_id'),
        );
        $t = new Semantic();
        $t -> init($t_input);
        $t->get_item_data();
        $analy_result = $t->analy();

        return json_encode($analy_result);
    }

    /**
     * 給前端直接呼叫模組修改用
     */
    public function modelPage($modelName)
    {
        $cs_id = app('request')->get('csID');
        $item_num = app('request')->get('itemNum');
        $paper_vol = app('request')->get('paperVol');
        $exam_class_obj = new ExamClass();
        $exam_class_obj ->init(array(
            'cs_id' => $cs_id,
            'paper_vol' => $paper_vol,
            'item_num' => $item_num,
        ));
        $data = array();
        $data['cs_id'] = $cs_id;
        $data['paper_vol'] = $paper_vol;
        $data['item_num'] = $item_num;
        $data['exam_data'] = $exam_class_obj -> get_exam_item_data();
        $data['exam_item'] = '';
        if ($modelName != null) {
            $data['exam_item'] = view('student.exam.modules.' . $modelName,$data);
        }

        return view('student.exam.test_page_inside', $data);
    }

    /**
     * 儲存學生的操作紀錄
     */
    public function setExamRecord()
    {
        $input_data = app('request')->all();
        $mem_id = app('request')->session()->get('user_data')['uid'];
        $exam_class_obj = new ExamClass();
        $exam_class_obj -> set_exam_record($mem_id,$input_data);

        return ;
    }


    /**
     * 成果查詢 第三層 查看學生操作某單元的細項資訊
     */
    public function viewExamRecordList($examrecord_id)
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $mem_id = app('request')->session()->get('user_data.uid');
        $data['exam_record'] = $exam_class_obj -> get_exam_record($mem_id,$examrecord_id);
        $data['exam_paper_id'] = $examrecord_id;
        $data['user_data'] = app('request')->session()->get('user_data');
        $t = new ExamRecordClass(array(
            'student_id' => app('request')->session()->get('user_data')['uid'],
            'exam_paper_id' => $examrecord_id,
        ));
        $t->set_has_view_record();

        return view('student.exam.record_view_list', $data);
    }

    /**
     * 觀看學生操作紀錄
     */
    public function viewExamRecord($id)
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $t = new FeedbackListClass();
        $data['feedback_list'] = $t->get_list_data();//回饋類型
        $mem_id = app('request')->session()->get('user_data.uid');
        $data['exam_record'] = $exam_class_obj -> get_exam_record($mem_id,$id);
        $unit_id = $data['exam_record']['unit_id'];
        $data['is_view_record'] = true;//是否為操作紀錄觀看模式
        $data['unit_id'] = $unit_id;
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['paper_data'] = $exam_class_obj -> get_paper_by_unit_id($unit_id);
        $data['questions_item_data'] = $exam_class_obj -> get_questions_item_paper_id($data['paper_data']);
        $data['begin_paper_index'] = 0;//起始試卷的index位置
        $data['begin_item_index'] = 0;//起始試題的index位置
        $t = new ExamRecordClass();
        $t ->init(array(
            'student_id' => app('request')->session()->get('user_data')['uid'],
            'unit_id' => $unit_id,
        ));
        $t->set_has_view_record();

        return view('student.exam.test_page', $data);
    }


    /**
     * 學生端 成果查詢 第一層 科目列表
     *
     * 備註：只顯示學生有操作紀錄的科目
     */
    public function Achievement()
    {
        $exam_class_obj = new ExamClass();
        $subject_obj = new SubjectClass();
        $data = array();
        $data['subject_list'] = $subject_obj -> subject_list();
        $data['user_data'] = app('request')->session()->get('user_data');
        $mem_id = app('request')->session()->get('user_data.uid');
        $data['list_data'] = $exam_class_obj -> get_record_unit_all($mem_id);

        return view('student.exam.achievement_level_one', $data);
    }

    /**
     * 學生端 成果查詢 第二層 指定科目內有完成的單元列表
     */
    public function AchievementList($unit_id)
    {
        $exam_class_obj = new ExamClass();
        $subject_obj = new SubjectClass();
        $data = array();
        $data['subject_list'] = $subject_obj -> subject_list();
        $data['user_data'] = app('request')->session()->get('user_data');
        $mem_id = app('request')->session()->get('user_data.uid');
        $data['list_data'] = $exam_class_obj -> get_record_list_by_subject($mem_id, $unit_id);
        $data['unit_id'] = $unit_id;

        return view('student.exam.achievement_level_two', $data);
    }

    /**
     * 學生端 成果查詢 下載成果查詢的資料
     */
    public function getDownloadRecord($examrecord_id)
    {
        $exam_class_obj = new ExamClass();
        $mem_id = app('request')->session()->get('user_data.uid');
        $exam_record = $exam_class_obj -> get_exam_record($mem_id,$examrecord_id);
        if(isset($exam_record['use_item']) AND count($exam_record['use_item']) > 0)
        {
            $excel_obj = new PhpExcel();
            $excel_obj ->set_excel_data($exam_record['use_item']);
            $excel_obj ->get_exam_record_file();
        }

    }
}
