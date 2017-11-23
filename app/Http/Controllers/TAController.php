<?php

namespace App\Http\Controllers;

use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ExamClass;
use App\Http\Providers\ExamPaperClass;
use App\Http\Providers\FeedbackListClass;
use App\Http\Providers\MemberClass;
use App\Http\Providers\PhpExcel;
use App\Http\Providers\QuestionsItemClass;
use App\Http\Providers\SchoolClass;
use App\Http\Providers\SubjectClass;
use App\Http\Providers\UnitClass;
use App\Http\Providers\ScriptClass;


class TAController extends Controller
{

    public static $module_type = array(
        '1' => '單代理人',
        '2' => '雙代理人',
        '3' => '多代理人',
    );
    private $uid = '0';
    private $uname = '';
    private $result_msg = array(
        'message' => 'success'
    );

    public function __construct()
    {
        $this -> uid = app('request')->session()->get('user_data.uid');
        $this -> uname = app('request')->session()->get('user_data.uname');
    }

    /**
     * 學習紀錄查詢 首頁
     */
    public function ExamRecordListPage()
    {
        $fp = Input::all();
        $data = array();
        $data['uname'] = $this -> uname;
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

    /**
     * 學習紀錄查詢 詳細操作紀錄列表
     */
    public function ExamRecordView($id,$uid)
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $data['uname'] = $this -> uname;
        $data['exam_record'] = $exam_class_obj -> get_exam_record($uid,$id);
        $data['uid'] = $uid;

        return view('teacher.examrecord.examrecord_detail', $data);
    }

    /**
     * 學習紀錄查詢 下載成果查詢的資料
     */
    public function getDownloadRecord($id,$uid)
    {
        $exam_class_obj = new ExamClass();
        if( $uid AND $id)
        {
            $exam_record = $exam_class_obj -> get_exam_record($uid,$id);
            if(isset($exam_record['use_item']) AND count($exam_record['use_item']) > 0)
            {
                $excel_obj = new PhpExcel();
                $excel_obj ->set_excel_data($exam_record['use_item']);
                $excel_obj ->get_exam_record_file();
            }
        }
    }

    /**
     * 學習紀錄查詢 回傳指定班級的所有學生資料
     */
    public function ExamRecordStudent()
    {
        $fp = Input::all();
        $return_array = array();
        $member_tmp = new MemberClass();
        $member_tmp -> init($fp);
        $class_student = $member_tmp -> get_all_class_student_data();
        if($class_student)
        {
            foreach($class_student as $v)
            {
                $return_array[$v['uid']] = $v['uname'];
            }
        }

        return json_encode($return_array);
    }


    /**
     * 建立結構(單元)
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function unitList()
    {
        $unit_class_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $unit_class_obj -> init(array('uid' => $this -> uid));
        $data = array();
        $data['uname'] = $this -> uname;
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = $unit_class_obj -> get_all_unit();
        $data['subject_list'] = $subject_obj -> subject_list();
        $data['module_type'] = self::$module_type;

        return view('teacher.unit.unit_list', $data);
    }

    /**
     * 新增一個結構(單元)的頁面
     *
     */
    public function unitAddPage()
    {
        $subject_obj = new SubjectClass();
        $data = array();
        $data['uname'] = $this -> uname;
        $data['title'] = '新增 ';
        $data['subject_list'] = $subject_obj -> subject_list();

        return view('teacher.unit.unit_add_page', $data);
    }

    /**
     * 編輯一個結構(單元)的頁面
     *
     */
    public function unitEditPage($id)
    {
        $unit_class_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $unit_class_obj ->init(array('id' => $id));
        $unit_class_obj -> init(array('uid'=> $this -> uid));
        $data = array();
        $data['uname'] = $this -> uname;
        $data['title'] = '編輯 ';
        $data['subject_list'] = $subject_obj -> subject_list();
        $data['old_data'] = $unit_class_obj -> get_unit();
        if(count($data['old_data']) == 0){

            return redirect()->route('ta.logout');
        }

        return view('teacher.unit.unit_edit_page', $data);
    }

    /**
     * 新增一筆結構(單元)的資料
     *
     */
    public function unitAddData()
    {
        $unit_class_obj = new UnitClass();
        $data = array();
        $data['uid'] = app('request')->session()->get('user_data.uid');
        $data['module_type'] = app('request')->get('module_type');
        $data['subject'] = app('request')->get('subject');
        $data['vol'] = app('request')->get('vol');
        $data['grade'] = app('request')->get('grade');
        $data['unit'] = app('request')->get('unit');
        $data['title'] = app('request')->get('title');
        $data['indicator_nums'] = app('request')->get('indicator_nums');
        if (Input::file('img') != null AND Input::file('img')->isValid()) {
            $extension = Input::file('img')->getClientOriginalExtension(); // getting image extension
            $fileName = time().'.'.$extension; // renameing image
            Input::file('img')->move('upfire/image', $fileName); // uploading file to given path
            $data['img'] = $fileName;
        }
        $unit_class_obj -> unit_add($data);

        return redirect()->route('ta.unit.list')->with('message', '單元結構新增完畢!');
    }

    /**
     * 更新一筆結構(單元)的資料
     *
     */
    public function unitUpdateData()
    {
        $unit_class_obj = new UnitClass();
        $data = array();
        $id = app('request')->get('id');
        $data['module_type'] = app('request')->get('module_type');
        $data['subject'] = app('request')->get('subject');
        $data['vol'] = app('request')->get('vol');
        $data['grade'] = app('request')->get('grade');
        $data['unit'] = app('request')->get('unit');
        $data['title'] = app('request')->get('title');
        $data['indicator_nums'] = app('request')->get('indicator_nums');
        if (Input::file('img') != null AND Input::file('img')->isValid()) {
            $extension = Input::file('img')->getClientOriginalExtension(); // getting image extension
            $fileName = time().'.'.$extension; // renameing image
            Input::file('img')->move('upfire/image', $fileName); // uploading file to given path
            $data['img'] = $fileName;
        }

        $unit_class_obj -> init(array('id'=>$id));
        $unit_class_obj -> unit_update($data);


        return redirect()->route('ta.unit.list')->with('message', '單元結構更新完畢!');
    }

    /**
     * 移除一個結構(單元)
     *
     */
    public function unitDelete()
    {
        $get_id = app('request')->get('getID');
        $unit_class_obj = new UnitClass();
        $unit_class_obj -> init(array('id'=>$get_id));
        $unit_class_obj -> unit_delete();

        return ;
    }

    /**
     * 新增一個試卷的頁面
     *
     */
    public function examPaperAddPage()
    {
        $unit_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $subject_obj -> init(array('uid' => $this -> uid ));
        $unit_obj -> init(array('uid' => $this -> uid ));
        $data = array();
        $data['uname'] = $this -> uname;
        $data['unit_id'] = '';
        $data['subject_access'] = $subject_obj -> get_access_subject();//目前開放的科目
        $data['subject_data'] = $subject_obj -> subject_list();
        $data['unit_data'] = $unit_obj -> get_all_unit();

        return view('teacher.exampaper.paper_add', $data);
    }

    /**
     * 新增試題資料頁面
     *
     *
     */
    public function questionsAddPage()
    {
        $unit_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $exampaper_obj = new ExamPaperClass();
        $t = new FeedbackListClass();
        $exampaper_obj ->init(array('uid'=>$this -> uid));
        $subject_obj -> init(array('uid'=> $this -> uid));
        $unit_obj -> init(array('uid'=> $this -> uid));
        $data = array();
        $data['uname'] = $this -> uname;
        $data['unit_data'] = $unit_obj -> get_all_unit();
        $data['subject_data'] = $subject_obj -> subject_list();
        $data['feedback_list'] = $t->get_list_data();
        $data['exampaper_data'] = $exampaper_obj->get_all_exampaper();
        //設定ckfinder
        //https://dotblogs.com.tw/jellycheng/archive/2013/09/11/118175.aspx
        $data['ck_finder_path'] = url('/admin/js/ckfinder');
        session_start();
        $_SESSION['ckfiner_key'] = true;
        $_SESSION['dirroot'] = url('/cc_upload').'/';//讀取路徑
        $_SESSION['upload_path'] = public_path('/cc_upload').'/';//儲存實體路徑

        return view('teacher.questions.questions_item_add', $data);
    }

    /**
     * 編輯試題-選擇試卷頁面
     */
    public function exampaperVolListPage()
    {
        $unit_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $exampaper_obj = new ExamPaperClass();
        $exampaper_obj ->init(array('uid'=>$this -> uid));
        $subject_obj -> init(array('uid'=>$this -> uid));
        $unit_obj -> init(array('uid'=> $this->uid));
        $data = array();
        $data['uname'] = $this -> uname;
        $data['unit_data'] = $unit_obj -> get_all_unit();
        $data['subject_data'] = $subject_obj -> subject_list();
        $data['exampaper_data'] = $exampaper_obj->get_all_exampaper();

        return view('teacher.exampaper.vol_select_page', $data);
    }

    /**
     * 新增一筆試卷的資料
     *
     */
    public function exampaperAddData()
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $data['uid'] = app('request')->session()->get('user_data')['uid'];
        $data['unit_list_id'] = app('request')->get('unit_list_id');
        $data['paper_vol'] = app('request')->get('paper_vol');
        if (Input::file('img') != null AND Input::file('img')->isValid()) {
            $extension = Input::file('img')->getClientOriginalExtension(); // getting image extension
            $fileName = time().'.'.$extension; // renameing image
            Input::file('img')->move('upfire/image', $fileName); // uploading file to given path
            $data['img'] = $fileName;
        }
        $exam_class_obj -> exampaper_add($data);

        return redirect()->route('ta.exampaper.add.page')->with('message', '試卷新增完畢!');
    }

    /**
     * 新增一個試題
     */
    public function questionsAdd(){
        $fp = Input::all();
        if(isset($fp['add_data'])){
            $get_input = array();
            foreach($fp['add_data'] as $v){
                $get_input = array_merge($get_input,$v);
            }
            $t = new QuestionsItemClass();
            $t -> init($get_input);
            $id = $t -> add();
        }


        return $id;
    }

    /**
     * 更新一個試題
     */
    public function questionsUpdate(){
        $fp = Input::all();
        if(isset($fp['update_data'])){
            $get_input = array();
            foreach($fp['update_data'] as $v){
                $get_input = array_merge($get_input,$v);
            }
            $t = new QuestionsItemClass();
            $t -> init($get_input);
            $id = $t -> update_data();
        }

        return $id;
    }

    /**
     * 編輯試題-選擇試題頁面
     */
    public function questionsListPage($id)
    {
        $unit_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $exampaper_obj = new ExamPaperClass();
        $questions_obj = new QuestionsItemClass();
        $exampaper_obj ->init(array('uid' => $this -> uid, 'id'=>$id));
        $questions_obj -> init(array('exam_paper_id'=>$id));
        $subject_obj -> init(array('uid' => $this -> uid));
        $unit_obj -> init(array('uid' => $this -> uid));
        $data = array();
        $data['uname'] = $this -> uname;
        $data['subject_data'] = $subject_obj -> subject_list();
        $data['exampaper_data'] = $exampaper_obj->get_exampaper();
        $data['exampaper_id'] = $id;
        $unit_obj -> init(array('id'=>$data['exampaper_data'][0]['unit_list_id']));
        $data['unit_data'] = $unit_obj -> get_unit();
        $data['questions'] = $questions_obj ->get_questions_data();

        return view('teacher.questions.questions_list', $data);
    }

    /**
     * 刪除一個試題資料
     */
    public static function questionsDelete()
    {
        $fp = Input::all();
        if(isset($fp['id'])){
            $t = new QuestionsItemClass();
            $t -> init(array('id'=>$fp['id'],'exam_paper_id'=>$fp['exam_paper_id']));
            $t -> delete_data();
        }

        return ;
    }

    /**
     * 編輯試題資料頁面
     *
     *
     */
    public function questionsEdit($id)
    {
        $unit_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $exampaper_obj = new ExamPaperClass();
        $t = new FeedbackListClass();
        $questions_item_obj = new QuestionsItemClass();
        $exampaper_obj ->init(array('uid' => $this -> uid));
        $questions_item_obj ->init(array('id'=>$id));
        $subject_obj -> init(array('uid' => $this -> uid));
        $unit_obj -> init(array('uid' => $this -> uid));
        $data = array();
        $data['uname'] = $this -> uname;
        $data['unit_data'] = $unit_obj -> get_all_unit();
        $data['subject_data'] = $subject_obj -> subject_list();
        $data['feedback_list'] = $t->get_list_data();
        $data['exampaper_data'] = $exampaper_obj->get_all_exampaper();
        $data['item_data'] = $questions_item_obj->get_one_item_data();
        $data['item_id'] = $id;
        //設定ckfinder
        //設定方式參考 https://dotblogs.com.tw/jellycheng/archive/2013/09/11/118175.aspx
        $data['ck_finder_path'] = url('/admin/js/ckfinder');
        session_start();
        $_SESSION['ckfiner_key'] = true;
        $_SESSION['dirroot'] = url('/cc_upload').'/';//讀取路徑
        $_SESSION['upload_path'] = public_path('/cc_upload').'/';//儲存實體路徑

        return view('teacher.questions.questions_item_edit', $data);
    }

    /**
     * 刪除一個試卷
     */
    public function exampaperDelete()
    {
        $get_id = app('request')->get('getID');
        $exam_class_obj = new ExamClass();
        $questions_obj = new QuestionsItemClass();
        $questions_obj -> init(array('exam_paper_id' => $get_id));
        $exam_class_obj -> exampaper_delete($get_id);
        $questions_obj ->delete_by_exam_paper_id();

        return ;
    }

    /**
     *教學劇本設計 前端 編輯頁面
     *
     */
    public function scriptAddPage()
    {
        $data = array();

        return view('teacher.script.edit', $data);
    }

    /**
     *教學劇本設計 前端api 新增資料
     *
     */
    public function scriptAdd()
    {
        $script_class_obj = new ScriptClass();
        $data = array();
        $data['uid'] = app('request')->session()->get('user_data.uid');
        $data['item_key'] = app('request')->get('item_key');
        $data['dsc'] = app('request')->get('dsc');
        $result = $script_class_obj -> scriptAdd($data);

        return json_encode($result);
    }

    /**
     *教學劇本設計 前端api 取得最新的批閱資料
     *
     */
    public function scriptChkUpdate()
    {
        $script_class_obj = new ScriptClass();
        $data = array();
        $data['uid'] = app('request')->session()->get('user_data.uid');
        $result = $script_class_obj -> getChkData($data);

        return json_encode($result);
    }

    /**
     *教學劇本設計 前端api 取得使用者已經填寫的資料，包含批閱資料
     *
     */
    public function scriptDefaultDate()
    {
        $script_class_obj = new ScriptClass();
        $uid = app('request')->session()->get('user_data.uid');
        $result = $script_class_obj -> getUserScriptData($uid);

        return json_encode($result);
    }

}
