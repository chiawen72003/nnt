<?php

namespace App\Http\Controllers;

use App\Http\Models\Subject;
use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ExamClass;
use App\Http\Models\QuestionsItem;

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
     * 首頁
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::unit_list();
        $data['exam_list'] = ExamClass::get_exam_paper_data($data['list_data']);
        $data['questions_item_nums'] = ExamClass::get_questions_item_nums($data['exam_list']);
        $data['subject_list'] = ExamClass::subject_list();
        $data['module_type'] = self::$module_type;

        return view('admin.list', $data);
    }

    /**
     * 單元列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function unitList()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::unit_list();

        return view('admin.unitlist', $data);
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

        return '';
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
    public function examPaperList()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::unit_list();

        return view('admin.index', $data);
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


        return view('admin.edititem', $data);
    }

    /**
     * 新增一個試題
     */
    public function questionsAdd(){
        $fp = Input::all();
        if(isset($fp['add_data'])){
            QuestionsItem::_init($fp['add_data']);
            $id = QuestionsItem::add();
        }


        return $id;
    }

    /**
     * 更新一個試題
     */
    public function questionsUpdate(){
        $fp = Input::all();
        if(isset($fp['update_data'])){
            QuestionsItem::_init($fp['update_data']);
            $id = QuestionsItem::update_data();
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
            QuestionsItem::_init(array(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id)));
            $return_data = QuestionsItem::next_data($return_data);
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
            QuestionsItem::_init(array(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id)));
            $return_data = QuestionsItem::back_data($return_data);
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
            QuestionsItem::_init(array(array('id'=>$fp['question_id'],'exam_paper_id'=>$paper_id)));
            $return_data = QuestionsItem::delete_data($return_data);
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

}
