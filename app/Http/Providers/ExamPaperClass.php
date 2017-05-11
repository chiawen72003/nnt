<?php

namespace App\Http\Providers;

use App\Http\Models\ExamPaper;
use \Input;

class ExamPaperClass
{
    private $input_data = array(
        'uid' => null,
        'id' => null,
        'unit_list_id' => null,
    );

    public function __construct()
    {
    }

    public function init($data)
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 試卷的資料
     */
    function get_exampaper()
    {
        $data = array();
        $t_obj = ExamPaper::where('id','>','0');
        if( is_array($this->input_data['id']))
        {
            $t_obj = $t_obj -> whereIn('id', $this->input_data['id']);
        }
        if( is_numeric($this -> input_data['id']))
        {
            $t_obj = $t_obj -> where('id', $this->input_data['id']);
        }
        if( $this -> input_data['unit_list_id'])
        {
            $t_obj = $t_obj -> where('unit_list_id', $this->input_data['unit_list_id']);
        }
        $t_obj = $t_obj ->orderBy('paper_vol')
            ->get();
        foreach ($t_obj as $v)
        {
            $data[] = $v->toArray();
        }

        return $data;
    }

    /**
     * 所有試卷的資料
     */
    function get_all_exampaper()
    {
        $data = array();
        $t_obj = ExamPaper::where('id','>','0');
        if($this->input_data['uid'])
        {
            $t_obj = $t_obj ->where('uid', $this->input_data['uid']);
        }
        $t_obj = $t_obj ->orderBy('unit_list_id')
            ->get();
        foreach ($t_obj as $v)
        {
            $data[] = $v->toArray();
        }

        return $data;
    }

    /**
     * 根據指定試卷，回傳對應的的單元id
     */
    function get_unit_id()
    {
        $data = array();
        if( is_array($this->input_data['id']))
        {
            $t_obj = ExamPaper::whereIn('id', $this->input_data['id'])
                ->groupBy('unit_list_id')
                ->get();
            foreach ($t_obj as $v)
            {
                $data[] = $v['unit_list_id'];
            }
        }
        if( is_numeric($this -> input_data['id']))
        {
            $t_obj = ExamPaper::where('id', $this->input_data['id'])
                ->get();
            foreach ($t_obj as $v)
            {
                $data[] = $v['unit_list_id'];
            }
        }

        return $data;
    }
}
