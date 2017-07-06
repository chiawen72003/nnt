<?php

namespace App\Http\Providers;

use App\Http\Models\UnitList;
use App\Http\Models\ExamRecord;
use App\Http\Models\ExamPaper;
use App\Http\Models\ExamPaperAccess;
use \Input;

class UnitClass
{
    private $input_data = array(
        'id' => null,
        'uid' => null,
        'unlock' => null,
        'lock' => null,
    );

    public function init($data = array())
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }
    /**
     * 所有單元的資料
     */
    function get_all_unit()
    {
        $data = array();
        $t_obj = UnitList::orderBy('module_type');
        if($this->input_data['uid'])
        {
            $t_obj = $t_obj->where('uid', $this->input_data['uid']);
        }
        $t_obj = $t_obj->orderBy('subject')
            ->orderBy('vol')
            ->orderBy('unit')
            ->orderBy('grade')
            ->get();
        foreach ($t_obj as $v)
        {
            $data[] = $v->toArray();
        }

        return $data;
    }


    /**
     *  設定 單元上鎖
     */
    public function set_unit_lock()
    {
        if($this->input_data['lock'] AND is_array($this->input_data['lock']))
        {
            UnitList::whereIn('id', $this->input_data['lock'])
                ->update([
                    'is_lock' => '1'
                    ]);
        }
    }

    /**
     *  解除 單元上鎖
     */
    public function unit_set_Lock()
    {
        if($this->input_data['unlock'] AND is_array($this->input_data['unlock']))
        {
            UnitList::whereIn('id', $this->input_data['unlock'])
                ->update([
                    'is_lock' => '0'
                    ]);
        }
    }

    /**
     * 取得一筆單元資料
     *
     * @param array $return_data
     */
    public function get_unit()
    {
        $return_data = array();
        $temp_obj = UnitList::select(
            'id',
            'unit_key',
            'module_type',
            'subject',
            'vol',
            'unit',
            'title',
            'grade',
            'indicator_nums',
            'img'
        )
            ->where('id',$this->input_data['id'])
            ->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $unit_data){
                $return_data = $unit_data->toArray();
            }
        }

        return $return_data;
    }

    /**
     * 新增一筆單元資料
     *
     * @param array $insert_data 要新增的資料
     */
    public function unit_add($insert_data)
    {
        $temp_obj = new UnitList();
        foreach ($insert_data as $key => $value){
            $temp_obj->$key = $value;
        }
        $temp_obj->save();

        return ;
    }

    /**
     * 更新一筆單元資料
     *
     * @param array $insert_data 要新增的資料
     */
    public function unit_update($insert_data)
    {
        $temp_obj = UnitList::find($this->input_data['id']);
        if($temp_obj){
            foreach ($insert_data as $key => $value){
                $temp_obj->$key = $value;
            }
            $temp_obj->save();
        }

        return ;
    }

    /**
     * 移除一個單元
     *
     * @param int/string $getID 要移除單元的id
     */
    public function unit_delete()
    {
        UnitList::destroy($this->input_data['id']);
        ExamRecord::where('unit_id', $this->input_data['id']) ->delete();
        ExamPaper::where('unit_list_id', $this->input_data['id']) ->delete();
        ExamPaperAccess::where('unit_list_id', $this->input_data['id']) ->delete();

        return ;
    }

}
