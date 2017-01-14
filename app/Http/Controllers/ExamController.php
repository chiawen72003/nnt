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
    public function index()
    {
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = ExamClass::get_exam_list($data['user_data']);

        return view('student.exam.list', $data);
    }

    /**
     * 受測頁面的外框部份
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testPage()
    {
        $cs_id = str_pad(app('request')->get('ep_item_0'), 3, '0', STR_PAD_LEFT);
        $cs_id .= str_pad(app('request')->get('ep_item_1'), 2, '0', STR_PAD_LEFT);
        $cs_id .= str_pad(app('request')->get('ep_item_2'), 2, '0', STR_PAD_LEFT);
        $cs_id .= str_pad(app('request')->get('ep_item_3'), 2, '0', STR_PAD_LEFT);
        $paper_vol = str_pad(app('request')->get('ep_item_4'), 2, '0', STR_PAD_LEFT);
        ExamClass::init(
            array(
                'cs_id' => $cs_id,
                'paper_vol' => $paper_vol,
                'item_num' => '1',
            )
        );

        $data = array();
        $data['cs_id'] = $cs_id;
        $data['paper_vol'] = $paper_vol;
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['exam_option_rule'] = ExamClass::get_option_rule();
        $data['item_num_filename'] = ExamClass::get_item_filename();

        return view('student.exam.test_page', $data);
    }

    /**
    * 受測頁面的內框部份：包含題號、標題、模組資料
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function GetModelPage()
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
        if ($data['exam_data']['load_module'] != null) {
            $data['exam_item'] = view('student.exam.modules.' . $data['exam_data']['load_module'],$data);
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
}
