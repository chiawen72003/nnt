<?php

namespace App\Http\Providers;

use App\Http\Models\Subject;
use \Input;


class SubjectClass
{
    public $input_data = array();

    public function __construct($data = array())
    {
        foreach ($data as $key => $value) {
            $this -> input_data[$key] = $value;
        }
    }

    /**
     * 領域名稱列表
     *
     * @return array 領域名稱資料(id=>名稱)
     */
    public function subject_list()
    {
        $subject_list = array();
        $temp_obj = Subject::select('id','name')->get();
        if($temp_obj)
        {
            foreach ($temp_obj as $value){
                $subject_list[$value['id']] = $value['name'];
            }
        }

        return $subject_list;
    }

    /**
     * 回傳科目列表
     *
     * @return mixed
     */
    public function get_list()
    {
        $temp_obj = Subject::select('id', 'name')
            ->paginate(5);

        return $temp_obj;
    }

    /**
     * 新增 科目
     *
     * @return mixed
     */
    public function add()
    {
        if (isset($this -> input_data['name'])) {
            $temp_obj = new Subject();
            $temp_obj->name = $this -> input_data['name'];
            $temp_obj->save();

            return true;
        }

        return false;
    }

    /**
     * 更新 科目
     *
     * @return mixed
     */
    public function update_data()
    {
        if (
            isset($this -> input_data['name'])
            AND isset($this -> input_data['id'])
        ) {
            Subject::where('id', $this -> input_data['id'])
                ->update(['name' => $this -> input_data['name']]);

            return true;
        }

        return false;
    }

    /**
     * 刪除 科目
     *
     * @return mixed
     */
    public function delete_data()
    {
        if (isset($this -> input_data['id'])) {
            Subject::where('id', $this -> input_data['id'])->delete();

            return true;
        }

        return false;
    }
}
