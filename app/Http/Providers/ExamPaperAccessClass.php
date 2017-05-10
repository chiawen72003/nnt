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
    public function get_exampaperaccess_data()
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

    /**
     * 更新班級-試卷存取資料
     *
     */
    public function update_data()
    {
        if(
            $this->input_data['organization_id']
            AND $this->input_data['grade']
            AND $this->input_data['class']
        )
        {
            ExamPaperAccess::where('organization_id', $this->input_data['organization_id'])
                ->where('grade', $this->input_data['grade'])
                ->where('class', $this->input_data['class'])
                ->delete();
            if(is_array($this->input_data['exam_paper_id']))
            {
                $data = array();
                foreach($this->input_data['exam_paper_id'] as $v)
                {
                    $data[] = array(
                        'organization_id'=> $this->input_data['organization_id'],
                        'grade'=> $this->input_data['grade'],
                        'class'=> $this->input_data['class'],
                        'exam_paper_id'=> $v
                    );
                }
                //以批次新增的方式處理
                ExamPaperAccess::insert($data);
            }
        }
    }
}
