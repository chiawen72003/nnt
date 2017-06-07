<?php

namespace App\Http\Controllers;

use App\Http\Models\ModelItem;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\ModelItemClass;

class ApiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * 模組名稱列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function modelList()
    {
        $data = array();
        $t_obj = new ModelItemClass();
        $data = $t_obj -> get_model_list();

        return json_encode($data);
    }


    /**
     * 指定模組的操作頁面
     */
    public function modelPage($id)
    {

    }
}
