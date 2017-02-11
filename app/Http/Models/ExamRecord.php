<?php

namespace App\Http\Models;

class ExamRecord extends BaseModel
{
    protected $table = 'exam_record';
    protected $primaryKey = 'id';
    public $timestamps = false;

    private $item_data = array(
        'student_id' => null,
        'exam_paper_id' => null,
    );

    public function _init($input_data)
    {
        foreach ($input_data as $key => $value) {
            $this->item_data[$key] = $value;
        }
    }

    /**
     * 取得試卷內試題的數量
     *
     */
    public function get_review_data($student_id)
    {
        $return_data = array();

        $item_obj = ExamRecord::select('exam_paper_id','has_review')
            ->where('student_id',$student_id)
            ->get();
        if($item_obj)
        {
            foreach ($item_obj as $value){
                $return_data[$value['exam_paper_id']] = $value['has_review'];
            }
        }

        return $return_data;
    }

    /**
     * 新增一筆紀錄
     *
     */
    public function set_record()
    {
        if( $this->item_data['student_id']
            AND $this->item_data['exam_paper_id'] )
        {

            $t_obj = new ExamRecord();
            $t_obj->student_id =  $this->item_data['student_id'];
            $t_obj->exam_paper_id =  $this->item_data['exam_paper_id'];
            $t_obj->save();
        }

        return ;
    }
}
