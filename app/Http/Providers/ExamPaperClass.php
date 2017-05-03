<?php

namespace App\Http\Providers;

use App\Http\Models\ExamPaper;
use \Input;

class ExamPaperClass
{
    private $input_data = array(
        'uid' => null,
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
     * 所有試卷的資料
     */
    function get_all_exampaper()
    {
        $data = array();
        if($this->input_data['uid'])
        {
            $t_obj = ExamPaper::where('uid', $this->input_data['uid'])
                ->orderBy('unit_list_id')
                ->get();
            foreach ($t_obj as $v)
            {
                $data[] = $v->toArray();
            }
        }

        return $data;
    }

}
