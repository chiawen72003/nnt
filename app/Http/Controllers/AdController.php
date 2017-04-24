<?php

namespace App\Http\Controllers;

use App\Http\Providers\MemberClass;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ExamClass;
use App\Http\Providers\QuestionsItemClass;
use App\Http\Providers\SchoolClass;
use App\Http\Providers\NewsClass;
use App\Http\Providers\FeedbackListClass;
use App\Http\Providers\SubjectClass;
use App\Http\Providers\UnitClass;

class AdController extends Controller
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
     * 首頁 單元列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $exam_class_obj = new ExamClass();
        $subject_obj = new SubjectClass();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = $exam_class_obj -> unit_list();
        $data['subject_list'] = $subject_obj -> subject_list();
        $data['module_type'] = self::$module_type;

        return view('admin.unit_list', $data);
    }

    /**
     * 新增一個單元的頁面
     *
     */
    public function unitAddPage()
    {
        $subject_obj = new SubjectClass();
        $data = array();
        $data['title'] = '新增 ';
        $data['subject_list'] = $subject_obj -> subject_list();
        $data['form_path'] = 'ad.unit.add.data';

        return view('admin.unit.unit_add_page', $data);
    }

    /**
     * 編輯一個單元的頁面
     *
     */
    public function unitEditPage($id)
    {
        $exam_class_obj = new ExamClass();
        $subject_obj = new SubjectClass();
        $data = array();
        $data['title'] = '編輯 ';
        $data['subject_list'] = $subject_obj -> subject_list();
        $data['old_data'] = $exam_class_obj -> get_unit($id);
        $data['form_path'] = 'ad.unit.update.data';

        return view('admin.unitedit', $data);
    }


    /**
     * 新增一筆單元的資料
     *
     */
    public function unitAddData()
    {
        $exam_class_obj = new ExamClass();
        $data = array();
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
        $exam_class_obj -> unit_add($data);

        return redirect()->route('ad.unit.add.page')->with('message', '單元結構新增完畢!');
    }

    /**
     * 更新一筆單元的資料
     *
     */
    public function unitUpdateData()
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $id = app('request')->get('cs_sn');
        $data['publisher_id'] = app('request')->get('publisher_id');
        $data['subject_id'] = app('request')->get('subject_id');
        $data['vol'] = app('request')->get('vol');
        $data['grade'] = app('request')->get('grade');
        $data['unit'] = app('request')->get('unit');
        $data['concept'] = app('request')->get('concept');
        $data['indicator_nums'] = app('request')->get('indicator_nums');
        $exam_class_obj -> unit_update($id,$data);

        return '';
    }

    /**
     * 移除一個單元
     *
     */
    public function unitDelete()
    {
        $exam_class_obj = new ExamClass();
        $get_id = app('request')->get('getID');
        $exam_class_obj -> unit_delete($get_id);

        return ;
    }

    /**
     * 試卷列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examPaperList($unit_id)
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = $exam_class_obj -> get_exam_paper_data($unit_id);
        $data['questions_item_nums'] = $exam_class_obj -> get_questions_item_nums($data['list_data']);
        $data['unit_id'] = $unit_id;

        return view('admin.paper_list', $data);
    }

    /**
     * 新增一個試卷的頁面
     *
     */
    public function examPaperAddPage()
    {
        $data = array();
        $data['unit_id'] = '';
        $unit_obj = new UnitClass();
        $subject_obj = new SubjectClass();
        $data['unit_data'] = $unit_obj -> get_all_unit();
        $data['subject_data'] = $subject_obj -> subject_list();

        return view('admin.exampaper.paper_add', $data);
    }

    /**
     * 新增一筆試卷的資料
     *
     */
    public function exampaperAddData()
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $data['unit_list_id'] = app('request')->get('getID');
        $data['title'] = app('request')->get('title');
        $exam_class_obj -> exampaper_add($data);

        return '';
    }

    /**
     * 刪除一個試卷
     */
    public function exampaperDelete()
    {
        $exam_class_obj = new ExamClass();
        $get_id = app('request')->get('getID');
        $exam_class_obj -> exampaper_delete($get_id);

        return ;
    }

    /**
     * 編輯試題資料頁面
     *
     *
     */
    public function questionsEdit($id)
    {
        $exam_class_obj = new ExamClass();
        $data = array();
        $data['exampaper_data'] = $exam_class_obj -> get_exam_paper($id);
        $data['unit_data'] = $exam_class_obj -> get_unit($data['exampaper_data']['unit_list_id']);
        $t = new FeedbackListClass();
        $data['feedback_list'] = $t->get_list_data();

        return view('admin.questions_item_edit', $data);
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
            $t = new QuestionsItemClass($get_input);
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
            $t = new QuestionsItemClass($get_input);
            $id = $t -> update_data();
        }

        return $id;

    }

    /**
     * 取得下一個試題資料
     */
    public function questionsNext($paper_id)
    {
        $return_data = array(
            'type' => 'error',
            'data' => array(),
            'has_next' => false,
            'has_back' => false,
        );

        $fp = Input::all();
        if(isset($fp['question_id'])){
            $t = new QuestionsItemClass(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id));
            $return_data = $t -> next_data($return_data);
        }

        return json_encode($return_data);
    }


    /**
     * 取得下一個試題資料
     */
    public function questionsBack($paper_id)
    {
        $return_data = array(
            'type' => 'error',
            'data' => array(),
            'has_next' => false,
            'has_back' => false,
        );

        $fp = Input::all();
        if(isset($fp['question_id'])){
            $t = new QuestionsItemClass(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id));
            $return_data = $t -> back_data($return_data);
        }

        return json_encode($return_data);
    }

    /**
     * 刪除一個試題資料
     */
    public static function questionsDelete($paper_id)
    {
        $return_data = array(
            'type' => 'error',
            'has_next' => false,
            'has_back' => false,
        );

        $fp = Input::all();
        if(isset($fp['question_id'])){
            $t = new QuestionsItemClass(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id));
            $return_data = $t -> delete_data($return_data);
        }

        return json_encode($return_data);
    }

    /**
     * 科目列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function subjectList()
    {
        $subject_obj = new SubjectClass();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = $subject_obj -> get_list();

        return view('admin.subject_list', $data);
    }

    /**
     * 新增一筆科目的資料
     *
     */
    public function  subjectAdd()
    {
        $fp = Input::all();
        $subject_obj = new SubjectClass($fp);
        $subject_obj -> add();

        return '';
    }

    /**
     * 更新一筆科目的資料
     *
     */
    public function subjectUpdate()
    {
        $fp = Input::all();
        $subject_obj = new SubjectClass($fp);
        $subject_obj -> update_data();

        return '';
    }

    /**
     * 移除一個科目
     *
     */
    public function subjectDelete()
    {
        $fp = Input::all();
        $subject_obj = new SubjectClass($fp);
        $subject_obj -> delete_data();

        return ;
    }

    /**
     * 學校列表
     *
     */
    public function schoolList()
    {
        $fp = Input::all();
        $city_code = isset($fp['city'])?$fp['city']:'1';
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $school_tmp = new SchoolClass(
            array('city_code' => $city_code)
        );
        $data['list_data'] = $school_tmp -> get_school_list();
        $data['city_data'] = $school_tmp -> get_all_city_data();
        $data['city_code'] = $city_code;

        return view('admin.school_list', $data);
    }

    /**
     * 學校新增 頁面
     *
     */
    public function schoolAddPage()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $school_tmp = new SchoolClass();
        $data['city_data'] = $school_tmp -> get_all_city_data();

        return view('admin.school_add_page', $data);
    }

    /**
     * 學校更新 頁面
     *
     */
    public function schoolEditPage($id)
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $school_tmp = new SchoolClass(
            array('id' => $id)
        );
        $data['school_data'] = $school_tmp -> get_school_data();
        $data['city_data'] = $school_tmp -> get_all_city_data();

        return view('admin.school_edit_page', $data);
    }

    /**
     * 新增一筆學校的資料
     *
     * 備註：先檢查id是否重複，沒有重複在新增
     */
    public function schoolAdd()
    {
        $fp = Input::all();
        $school_tmp = new SchoolClass($fp);
        $isAdd = $school_tmp -> add();

        return redirect()->route('ad.school.list');
    }

    /**
     * 更新一筆學校的資料
     *
     */
    public function schoolUpdate()
    {
        $fp = Input::all();
        $school_tmp = new SchoolClass($fp);
        $school_tmp -> update_data();

        return ;
    }

    /**
     * 移除一個學校
     *
     */
    public function schoolDelete()
    {
        $fp = Input::all();
        $school_tmp = new SchoolClass($fp);
        $school_tmp -> delete_data();

        return ;
    }

    /**
     * 使用者新增 頁面
     *
     */
    public function userAddPage()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $school_tmp = new SchoolClass();
        $member_tmp = new MemberClass();
        $data['city_data'] = $school_tmp -> get_all_city_data();
        $data['all_school'] = $school_tmp -> get_all_school();
        $data['all_level'] = $member_tmp -> get_all_level();

        return view('admin.user.user_add_page', $data);
    }

    /**
     * 使用者新增
     *
     */
    public function userAdd()
    {
        $fp = Input::all();
        $school_tmp = new MemberClass($fp);
        $school_tmp -> set_add_user();

        return ;
    }


    /**
     * 匯入使用者頁面
     *
     */
    public function userImportPage()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $school_tmp = new SchoolClass();
        $member_tmp = new MemberClass();
        $data['city_data'] = $school_tmp -> get_all_city_data();
        $data['all_school'] = $school_tmp -> get_all_school();
        $data['all_level'] = $member_tmp -> get_all_level();

        return view('admin.user.user_import_page', $data);
    }

    /**
     * 查詢使用者資料頁面
     *
     */
    public function userSearchPage()
    {
        $fp = Input::all();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $school_tmp = new SchoolClass();
        $member_tmp = new MemberClass();
        $data['city_data'] = $school_tmp -> get_all_city_data();
        $data['all_school'] = $school_tmp -> get_all_school();
        $data['all_level'] = $member_tmp -> get_all_level();
        $data['class_student'] = $member_tmp -> get_class_student_data();
        $data['city_code'] = isset($fp['city_code'])?$fp['city_code']:null;
        $data['organization_id'] = isset($fp['organization_id'])?$fp['organization_id']:null;
        $data['grade'] = isset($fp['grade'])?$fp['grade']:null;
        $data['class'] = isset($fp['class'])?$fp['class']:null;

        return view('admin.user.user_search_page', $data);
    }

    /**
     * 移除一個學生
     *
     */
    public function userSearchDelete()
    {
        $fp = Input::all();
        $school_tmp = new MemberClass();
        $school_tmp -> set_remove_student();

        return ;
    }

    /**
     * 移除一個班級的學生
     *
     */
    public function userSearchAllDelete()
    {
        $fp = Input::all();
        $school_tmp = new MemberClass();
        $school_tmp -> set_remove_all_student();

        return ;
    }

    /**
     * 科目控管
     */
    public function userSubjectLimitPage()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $member_tmp = new MemberClass();
        $data['all_teacher'] = $member_tmp -> get_teacher_data();
        $data['all_level'] = $member_tmp -> get_all_level();

        return view('admin.subject.subject_limit', $data);
    }

    /**
     * 取得教師開放跟未開放的科目資料
     */
    public function userSubjectLockUnLock()
    {
        $fp = Input::all();
        $subject_obj = new SubjectClass($fp);
        $access_data = $subject_obj -> get_access_subject();
        $subject_data = $subject_obj -> subject_list();
        $return_data = array(
            'subject_data' => $subject_data,
            'access_data' => $access_data
        );

        return json_encode($return_data);
    }

    /**
     * 增加教師開放的科目資料
     */
    public function userSubjectSetUnLock()
    {
        $fp = Input::all();
        $subject_obj = new SubjectClass($fp);
        $subject_obj -> set_access_subject();

        return ;
    }

    /**
     * 移除教師開放的科目資料
     */
    public function userSubjectSetLock()
    {
        $fp = Input::all();
        $subject_obj = new SubjectClass($fp);
        $subject_obj -> unset_access_subject();

        return ;
    }

    /**
     * 單元上鎖頁面
     */
    public  function unitLockPage()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $subject_obj = new SubjectClass();
        $data['subject_data'] = $subject_obj ->subject_list();

        return view('admin.unit.unit_lock', $data);
    }


    /**
     * 增加 單元上鎖的資料
     */
    public function unitSetLock()
    {
        $fp = Input::all();
        $unit_obj = new UnitClass($fp);
        $unit_obj -> set_unit_lock();

        return ;
    }

    /**
     * 解除 單元上鎖的資料
     */
    public function unitSetUnLock()
    {
        $fp = Input::all();
        $unit_obj = new UnitClass($fp);
        $unit_obj -> unit_set_Lock();

        return ;
    }


    /**
     * 所有單元的資料
     */
    public function unitLockData()
    {
        $unit_obj = new UnitClass();
        $unit_data = $unit_obj->get_all_unit();

        return json_encode($unit_data);
    }

    /**
     * 系統公告列表
     *
     */
    public function newsList()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $organization = new NewsClass();
        $data['list_data'] = $organization->get_news_list();

        return view('admin.news_list', $data);
    }

    /**
     * 系統公告 新增頁面
     *
     */
    public function newsAddPage()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');

        return view('admin.news_add_page', $data);
    }

    /**
     * 系統公告 編輯頁面
     *
     */
    public function newsEditPage($id)
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $newsobj = new NewsClass();
        $data['news_data'] = $newsobj -> get_old_data($id);

        return view('admin.news_edit_page', $data);
    }
    /**
     * 新增一筆系統公告的資料
     */
    public function newsAdd()
    {
        $fp = Input::all();
        $newsobj = new NewsClass($fp);
        $isAdd = $newsobj -> add_data();

        return redirect()->route('ad.news.list')->with('message', '系統公告新增完畢!');
    }

    /**
     * 更新一筆系統公告的資料
     *
     */
    public function newsUpdate()
    {
        $fp = Input::all();
        $newsobj = new NewsClass($fp);
        $newsobj -> update_data();

        return redirect()->route('ad.news.list')->with('message', '系統公告更新完畢!');
    }

    /**
     * 移除一個系統公告
     *
     */
    public function newsDelete()
    {
        $fp = Input::all();
        $newsobj = new NewsClass($fp);
        $newsobj -> delete_data();

        return ;
    }

}
