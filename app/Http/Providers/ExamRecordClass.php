<?php

namespace App\Http\Providers;

use App\Http\Models\ExamRecord;

class ExamRecordClass
{
    private $item_data = array(
        'student_id' => null,
        'unit_id' => null,
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

        $item_obj = ExamRecord::select('unit_id', 'has_review')
            ->where('student_id', $student_id)
            ->where('has_review', '1')
            ->get();
        foreach ($item_obj as $value) {
            $return_data[$value['unit_id']] = true;
        }

        return $return_data;
    }

    /**
     * 新增一筆紀錄
     *
     */
    public function set_record()
    {
        if ($this->item_data['student_id']
            AND $this->item_data['unit_id']
            AND $this->item_data['itemData']
            AND is_numeric($this->item_data['isFinish'])
        ) {
            $t_obj = ExamRecord::where('unit_id', $this->item_data['unit_id'])
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
                }
            } else {
                $t_obj = new ExamRecord();
                $t_obj->student_id = $this->item_data['student_id'];
                $t_obj->unit_id = $this->item_data['unit_id'];
                $t_obj->record = json_encode($this->item_data['record']);
                $t_obj->use_item = json_encode($this->item_data['itemData']);
                $t_obj->is_finish = $this->item_data['isFinish'];
                $t_obj->save();
            }


        }

        return;
    }

    /**
     * 取得指定的紀錄資料
     */
    public function get_one_record()
    {
        $return_data = null;
        $t_obj = ExamRecord::where('unit_id', $this->item_data['unit_id'])
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
        $t_obj = ExamRecord::where('unit_id', $this->item_data['unit_id'])
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
        $t_obj = ExamRecord::where('unit_id', $this->item_data['unit_id'])
            ->where('student_id', $this->item_data['student_id'])
            ->get();
        foreach ($t_obj as $v) {
            $v['has_review'] = 1;
            $v->save();
        }

        return;
    }
}
