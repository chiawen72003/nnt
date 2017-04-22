<?php

namespace App\Http\Providers;

use App\Http\Models\Subject;
use App\Http\Models\SubjectLimit;
use \Input;


class SubjectClass
{
    public $input_data = array(
        'user_id' => null
    );

    public function __construct($data = array())
    {
        foreach ($data as $key => $value) {
            $this -> input_data[$key] = $value;
        }
    }

    /**
     * 科目名稱列表
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

    /**
     * 取得現有已經上鎖的科目資料
     *
     */
    public function get_limit_subject()
    {
        $data = array();
        if($this->input_data['user_id'])
        {
            $t_obj = SubjectLimit::where('user_id', $this->input_data['user_id'])
                ->get();
            foreach ($t_obj as $v)
            {
                $data[] = $v -> subject_id;
            }
        }

        return $data;
    }
}
