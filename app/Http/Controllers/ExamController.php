<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ExamClass;

class ExamController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * 首頁
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::get_exam_list($data['user_data']);

        return view('student.exam.index', $data);
    }

    /**
     * 測驗單元列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examList()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::get_exam_list($data['user_data']);
        $data['subject_list'] = ExamClass::subject_list();
        $data['exam_review_data'] = ExamClass::get_review_data($data['user_data']);

        return view('student.exam.list', $data);
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
        $unit_id = app('request')->get('unit_id');
        ExamClass::init(
            array(
                'unit_id' => $unit_id
            )
        );

        $data = array();
        $data['is_view_record'] = false;//是否為操作紀錄觀看模式
        $data['unit_id'] = $unit_id;
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['paper_data'] = ExamClass::get_paper_by_unit_id($unit_id);
        $data['questions_item_data'] = ExamClass::get_questions_item_paper_id($data['paper_data']);
        $data['begin_paper_index'] = 0;//起始試卷的index位置
        $data['begin_item_index'] = 0;//起始試題的index位置

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
        ExamClass::init(
            array(
                'item_id' => $item_id,
            )
        );
        $data['item_num'] = 1;
        $data['exam_data'] = ExamClass::get_exam_item_data();
        $data['exam_item'] = '';
        if ($data['exam_data']['load_module'] != null) {

            $data['exam_item'] = view('student.exam.modules.'.$data['exam_data']['load_module'] ,$data);
        }

        return view('student.exam.test_page_inside', $data);
    }

    /**
     * 分析作答資料是否正確或錯誤
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ansAnaly()
    {
        $cs_id = app('request')->get('csID');
        $item_num = app('request')->get('itemNum');
        $paper_vol = app('request')->get('paperVol');
        $data = array(
            'cs_id' => $cs_id,
            'paper_vol' => $paper_vol,
            'item_num' => $item_num,
        );
        ExamClass::init($data);
        $analy_result = ExamClass::get_analy_result();

        return $analy_result;
    }

    /**
     * 給前端直接呼叫模組修改用
     */
    public function modelPage($modelName)
    {
        $cs_id = app('request')->get('csID');
        $item_num = app('request')->get('itemNum');
        $paper_vol = app('request')->get('paperVol');
        ExamClass::init(
            array(
                'cs_id' => $cs_id,
                'paper_vol' => $paper_vol,
                'item_num' => $item_num,
            )
        );

        $data = array();
        $data['cs_id'] = $cs_id;
        $data['paper_vol'] = $paper_vol;
        $data['item_num'] = $item_num;
        $data['exam_data'] = ExamClass::get_exam_item_data();
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
        $mem_id = app('request')->session()->get('user_data')['user_id'];
        ExamClass::set_exam_record($mem_id,$input_data);

        return ;
    }

    /**
     * 觀看學生操作紀錄
     */
    public function viewExamRecord($id)
    {
        $data = array();
        $mem_id = app('request')->session()->get('user_data');
        $data['exam_record'] = ExamClass::get_exam_record($mem_id,$id);
        $unit_id = $data['exam_record']['unit_id'];

        ExamClass::init(
            array(
                'unit_id' => $unit_id
            )
        );

        $data['is_view_record'] = true;//是否為操作紀錄觀看模式
        $data['unit_id'] = $unit_id;
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['paper_data'] = ExamClass::get_paper_by_unit_id($unit_id);
        $data['questions_item_data'] = ExamClass::get_questions_item_paper_id($data['paper_data']);
        $data['begin_paper_index'] = 0;//起始試卷的index位置
        $data['begin_item_index'] = 0;//起始試題的index位置

        return view('student.exam.test_page', $data);
    }
}
