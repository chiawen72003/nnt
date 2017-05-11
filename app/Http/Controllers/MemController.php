<?php

namespace App\Http\Controllers;

use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\NewsClass;

class MemController extends Controller
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
     * 學生端 首頁
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');

        return view('student.index', $data);
    }

    /**
     * 學生端 系統公告
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function News()
    {
        $news_obj = new NewsClass();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = $news_obj -> get_news_list();

        return view('student.news.index', $data);
    }


    /**
     * 學生端 系統公告 詳細內容
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function NewsDetail($id)
    {
        $news_obj = new NewsClass();
        $news_obj -> init(array('id'=>$id));
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['news_data'] = $news_obj ->get_old_data();

        return view('student.news.detail', $data);
    }

    /**
     * 學生端 系統公告 附件下載
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function NewsFileDownload($id)
    {
        $news_obj = new NewsClass();
        $news_obj -> init(array('id'=>$id));
        $news_data = $news_obj ->get_old_data();
        if(isset($news_data['file_path']) and $news_data['file_path'] != ''){

            return response()->download($news_data['file_path'],$news_data['file_name']);
        }

        return ;
    }
}
