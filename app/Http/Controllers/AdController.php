<?php

namespace App\Http\Controllers;

use App\Http\Models\FeedbackList;
use App\Http\Models\Subject;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ExamClass;
use App\Http\Models\QuestionsItem;
use App\Http\Models\Organization;
use App\Http\Providers\NewsClass;

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
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::unit_list();
        $data['subject_list'] = ExamClass::subject_list();
        $data['module_type'] = self::$module_type;

        return view('admin.unit_list', $data);
    }

    /**
     * 新增一個單元的頁面
     *
     */
    public function unitAddPage()
    {
        $data = array();
        $data['title'] = '新增 ';
        $data['subject_list'] = ExamClass::subject_list();
        $data['form_path'] = 'ad.unit.add.data';

        return view('admin.unitedit', $data);
    }

    /**
     * 編輯一個單元的頁面
     *
     */
    public function unitEditPage($id)
    {
        $data = array();
        $data['title'] = '編輯 ';
        $data['subject_list'] = ExamClass::subject_list();
        $data['old_data'] = ExamClass::get_unit($id);
        $data['form_path'] = 'ad.unit.update.data';

        return view('admin.unitedit', $data);
    }


    /**
     * 新增一筆單元的資料
     *
     */
    public function unitAddData()
    {
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
        ExamClass::unit_add($data);

        return redirect()->route('ad.index')->with('message', '單元結構新增完畢!');
    }

    /**
     * 更新一筆單元的資料
     *
     */
    public function unitUpdateData()
    {
        $data = array();
        $id = app('request')->get('cs_sn');
        $data['publisher_id'] = app('request')->get('publisher_id');
        $data['subject_id'] = app('request')->get('subject_id');
        $data['vol'] = app('request')->get('vol');
        $data['grade'] = app('request')->get('grade');
        $data['unit'] = app('request')->get('unit');
        $data['concept'] = app('request')->get('concept');
        $data['indicator_nums'] = app('request')->get('indicator_nums');

        ExamClass::unit_update($id,$data);

        return '';
    }

    /**
     * 移除一個單元
     *
     */
    public function unitDelete()
    {
        $get_id = app('request')->get('getID');
        ExamClass::unit_delete($get_id);

        return ;
    }

    /**
     * 試卷列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function examPaperList($unit_id)
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::get_exam_paper_data($unit_id);
        $data['questions_item_nums'] = ExamClass::get_questions_item_nums($data['list_data']);
        $data['unit_id'] = $unit_id;

        return view('admin.paper_list', $data);
    }

    /**
     * 新增一個試卷的頁面
     *
     */
    public function examPaperAddPage($unit_id)
    {
        $data = array();
        $data['unit_id'] = $unit_id;

        return view('admin.paper_edit', $data);
    }

    /**
     * 新增一筆試卷的資料
     *
     */
    public function exampaperAddData()
    {
        $data = array();
        $data['unit_list_id'] = app('request')->get('getID');
        $data['title'] = app('request')->get('title');

        ExamClass::exampaper_add($data);

        return '';
    }

    /**
     * 刪除一個試卷
     */
    public function exampaperDelete()
    {
        $get_id = app('request')->get('getID');
        ExamClass::exampaper_delete($get_id);

        return ;
    }

    /**
     * 編輯試題資料頁面
     *
     *
     */
    public function questionsEdit($id)
    {
        $data = array();
        $data['exampaper_data'] = ExamClass::get_exam_paper($id);
        $data['unit_data'] = ExamClass::get_unit($data['exampaper_data']['unit_list_id']);
        $t = new FeedbackList();
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
            $t = new QuestionsItem();
            $t -> _init($get_input);
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
            $t = new QuestionsItem();
            $t -> _init($get_input);
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
            $t = new QuestionsItem();
            $t -> _init(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id));
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
            $t = new QuestionsItem();
            $t -> _init(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id));
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
            $t = new QuestionsItem();
            $t -> _init(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id));
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
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = Subject::get_list();

        return view('admin.subject_list', $data);
    }

    /**
     * 新增一筆科目的資料
     *
     */
    public function  subjectAdd()
    {
        $fp = Input::all();
        Subject::_init($fp);
        Subject::add();

        return '';
    }

    /**
     * 更新一筆科目的資料
     *
     */
    public function subjectUpdate()
    {
        $fp = Input::all();
        Subject::_init($fp);
        Subject::update_data();

        return '';
    }

    /**
     * 移除一個科目
     *
     */
    public function subjectDelete()
    {
        $fp = Input::all();
        Subject::_init($fp);
        Subject::delete_data();

        return ;
    }

    /**
     * 學校列表
     *
     */
    public function schoolList()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $organization = new Organization();
        $data['list_data'] = $organization->get_list();

        return view('admin.school_list', $data);
    }

    /**
     * 新增一筆學校的資料
     *
     * 備註：先檢查id是否重複，沒有重複在新增
     */
    public function schoolAdd()
    {
        $fp = Input::all();
        $organization = new Organization();
        $organization->_init($fp);
        $isAdd = $organization->add();
        if($isAdd){

            return 'success';
        }

        return 'error';
    }

    /**
     * 更新一筆單元的資料
     *
     */
    public function schoolUpdate()
    {
        $fp = Input::all();
        $organization = new Organization();
        $organization->_init($fp);
        $organization->update_data();

        return ;
    }

    /**
     * 移除一個單元
     *
     */
    public function schoolDelete()
    {
        $fp = Input::all();
        $organization = new Organization();
        $organization->_init($fp);
        $organization->delete_data();

        return ;
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
     * 新增一筆系統公告的資料
     *
     * 備註：先檢查id是否重複，沒有重複在新增
     */
    public function newsAdd()
    {
        $fp = Input::all();
        $organization = new Organization();
        $organization->_init($fp);
        $isAdd = $organization->add();
        if($isAdd){

            return 'success';
        }

        return 'error';
    }

    /**
     * 更新一筆系統公告的資料
     *
     */
    public function newsUpdate()
    {
        $fp = Input::all();
        $organization = new Organization();
        $organization->_init($fp);
        $organization->update_data();

        return ;
    }

    /**
     * 移除一個系統公告
     *
     */
    public function newsDelete()
    {
        $fp = Input::all();
        $organization = new NewsClass($fp);
        $organization->delete_data();

        return ;
    }

}
