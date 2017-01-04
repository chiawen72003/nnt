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
     * 測驗單元列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index(){
		$data = array();
		$data['user_data'] = app('request')->session()->get('user_data');
		$data['list_data'] = ExamClass::get_exam_list($data['user_data']);

		return view('student.exam.list',$data);
	}

    /**
     * 受測頁面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testPage(){
        dd(app('request')->all());
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');

        return view('student.exam.list',$data);
    }
}
