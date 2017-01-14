<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ExamClass;

class AdController extends Controller
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

        return view('admin.index', $data);
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
        $data['publisher_id'] = app('request')->get('publisher_id');
        $data['subject_id'] = app('request')->get('subject_id');
        $data['vol'] = app('request')->get('vol');
        $data['grade'] = app('request')->get('grade');
        $data['unit'] = app('request')->get('unit');
        $data['concept'] = app('request')->get('concept');
        $data['indicator_nums'] = app('request')->get('indicator_nums');

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

}
