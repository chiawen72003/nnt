<?php

namespace App\Http\Controllers;

use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\SchoolClass;
use App\Http\Providers\MemberClass;



class TAController extends Controller
{
    public static $module_type = array(
        '1' => '單代理人',
        '2' => '雙代理人',
        '3' => '多代理人',
    );

    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * 學習紀錄查詢 首頁
     */
    public function ExamRecordListPage()
    {
        $fp = Input::all();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $school_tmp = new SchoolClass();
        $member_tmp = new MemberClass();
        $member_tmp -> init($fp);
        $data['city_data'] = $school_tmp -> get_all_city_data();
        $data['all_school'] = $school_tmp -> get_all_school();
        $data['all_level'] = $member_tmp -> get_all_level();
        $data['class_student'] = $member_tmp -> get_class_student_data();
        $data['city_code'] = isset($fp['city_code'])?$fp['city_code']:null;
        $data['organization_id'] = isset($fp['organization_id'])?$fp['organization_id']:null;
        $data['grade'] = isset($fp['grade'])?$fp['grade']:null;
        $data['class'] = isset($fp['class'])?$fp['class']:null;
        $data['uid'] = isset($fp['uid'])?$fp['uid']:null;
        //有指定學生時，取出該學生所有的操作紀錄資料
        if($data['uid'])
        {
            $exam_class_obj = new ExamClass();
            $subject_obj = new SubjectClass();
            $data['subject_list'] = $subject_obj -> subject_list();
            $data['list_data'] = $exam_class_obj -> get_record_list_all($data['uid']);
        }


        return view('teacher.examrecord.examrecord_list', $data);
    }
}
