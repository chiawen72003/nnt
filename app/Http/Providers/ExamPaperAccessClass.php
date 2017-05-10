<?php

namespace App\Http\Providers;

use App\Http\Models\ExamPaperAccess;
use \Input;

class ExamPaperAccessClass
{
    private $input_data = array(
        'id' => null,
        'exam_paper_id' => null,
        'organization_id' => null,
        'grade' => null,
        'class' => null,
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
     * 取得試卷存取的資料
     */
    function get_exampaperaccess_data()
    {
        $data = array();
        $t_obj = ExamPaperAccess::where('id','>','0');
        if($this->input_data['exam_paper_id'])
        {
            $t_obj = $t_obj -> where('exam_paper_id', $this->input_data['exam_paper_id']);
        }
        if($this->input_data['organization_id'])
        {
            $t_obj = $t_obj -> where('organization_id', $this->input_data['organization_id']);
        }
        if($this->input_data['grade'])
        {
            $t_obj = $t_obj -> where('grade', $this->input_data['grade']);
        }
        if($this->input_data['class'])
        {
            $t_obj = $t_obj -> where('class', $this->input_data['class']);
        }

        $t_obj = $t_obj ->orderBy('id')
            ->get();
        foreach ($t_obj as $v)
        {
            $data[] = $v->toArray();
        }


        return $data;
    }

}
