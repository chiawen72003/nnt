<?php

namespace App\Http\Providers;

use App\Http\Models\ExamRecord;
use App\Http\Models\ExamTempRecord;

class ExamRecordClass
{
    private $item_data = array(
        'id' => null,
        'student_id' => null,
        'exam_paper_id' => null,
        'record' => array(),
        'itemData' => array(),
        'isFinish' => null,
    );

    public function init($input_data = array())
    {
        foreach ($input_data as $key => $value) {
            $this->item_data[$key] = $value;
        }
    }

    /**
     * 取得學生已經觀看過操作紀錄的資料
     *
     */
    public function get_review_data($student_id)
    {
        $return_data = array();

        $item_obj = ExamRecord::select('exam_paper_id', 'has_review')
            ->where('student_id', $student_id)
            ->where('has_review', '1')
            ->get();
        foreach ($item_obj as $value) {
            $return_data[$value['exam_paper_id']] = true;
        }

        return $return_data;
    }

    /**
     * 新增一筆紀錄
     *
     * 1. 如果沒有操作紀錄時，在資料表exam_temp_record新增一筆暫存資料。
     * 2. 有操作紀錄但尚未操作完成前，更新資料表exam_temp_record的暫存資料。
     * 3. 測驗結束時，刪除資料表exam_temp_record的暫存資料。
     * 4. 測驗結束時，完整測驗資料存入資料表exam_record內。
     *
     */
    public function set_record()
    {
        if ($this->item_data['student_id']
            AND $this->item_data['exam_paper_id']
            AND $this->item_data['itemData']
            AND is_numeric($this->item_data['isFinish'])
        ) {
            $t_obj = ExamTempRecord::where('exam_paper_id', $this->item_data['exam_paper_id'])
                ->where('student_id', $this->item_data['student_id'])
                ->get();
            if (count($t_obj) == 1) {
                foreach ($t_obj as $v) {
                    $record = json_decode($v['record'], true);
                    foreach ($this->item_data['record'] as $t_record) {
                        $record[] = $t_record;
                    }
                    $v['record'] = json_encode($record);
                    $useitem = json_decode($v['use_item'], true);
                    foreach ($this->item_data['itemData'] as $t_itemdata) {
                        $useitem[] = $t_itemdata;
                    }
                    $v['use_item'] = json_encode($useitem);
                    $v['is_finish'] = $this->item_data['isFinish'];
                    $v->save();
                    //如果 操作結束時，新增資料到exam_record內，並刪除temp的資料
                    if( $v['is_finish'] == '1')
                    {
                        $record_obj = new ExamRecord();
                        $record_obj -> student_id = $v['student_id'];
                        $record_obj -> exam_paper_id = $v['exam_paper_id'];
                        $record_obj -> record = $v['record'];
                        $record_obj -> has_review = $v['has_review'];
                        $record_obj -> use_item = $v['use_item'];
                        $record_obj -> is_finish = $v['is_finish'];
                        $record_obj -> save();
                        $v -> delete();
                    }

                }
            } else {
                //預防只有一個試題就結束的狀況
                if( $this->item_data['isFinish'] == '1')
                {
                    $t_obj = new ExamRecord();
                    $t_obj->student_id = $this->item_data['student_id'];
                    $t_obj->exam_paper_id = $this->item_data['exam_paper_id'];
                    $t_obj->record = json_encode($this->item_data['record']);
                    $t_obj->use_item = json_encode($this->item_data['itemData']);
                    $t_obj->is_finish = $this->item_data['isFinish'];
                    $t_obj->save();
                }else{
                    $t_obj = new ExamTempRecord();
                    $t_obj->student_id = $this->item_data['student_id'];
                    $t_obj->exam_paper_id = $this->item_data['exam_paper_id'];
                    $t_obj->record = json_encode($this->item_data['record']);
                    $t_obj->use_item = json_encode($this->item_data['itemData']);
                    $t_obj->is_finish = $this->item_data['isFinish'];
                    $t_obj->save();
                }
            }


        }

        return;
    }

    /**
     * 取得一筆暫存的操作紀錄資料
     */
    public function get_temp_record()
    {
        $return_data = null;
        $t_obj = ExamTempRecord::where('exam_paper_id', $this->item_data['exam_paper_id'])
            ->where('student_id', $this->item_data['student_id'])
            ->get();
        foreach ($t_obj as $v) {

            return $v;
        }

        return $return_data;
    }

    /**
     * 取得指定的紀錄資料
     */
    public function set_clear_record()
    {
        $t_obj = ExamRecord::where('exam_paper_id', $this->item_data['exam_paper_id'])
            ->where('student_id', $this->item_data['student_id'])
            ->get();
        foreach ($t_obj as $v) {
            $v['record'] = '';
            $v['has_review'] = 0;
            $v['use_item'] = '';
            $v['is_finish'] = 0;
            $v->save();
        }

        return;
    }

    /**
     * 設定操作紀錄已經讀取過
     */
    public function set_has_view_record()
    {
        $t_obj = ExamRecord::where('id', $this->item_data['id'])
            ->where('student_id', $this->item_data['student_id'])
            ->get();
        foreach ($t_obj as $v) {
            $v['has_review'] = 1;
            $v->save();
        }

        return;
    }
}
