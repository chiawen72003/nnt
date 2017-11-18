<?php

namespace App\Http\Providers;

use App\Http\Models\Subject;
use App\Http\Models\SubjectAccess;
use \Input;


class SubjectClass
{
    public $input_data = array(
        'uid' => null,
        'unlock' => null,
        'lock' => null,
    );

    public function init($data = array())
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
            ->paginate(20);

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
     * 取得開放的科目資料
     *
     */
    public function get_access_subject()
    {
        $data = array();
        if($this->input_data['uid'])
        {
            $t_obj = SubjectAccess::where('uid', $this->input_data['uid'])
                ->get();
            foreach ($t_obj as $v)
            {
                $data[] = $v -> subject_id;
            }
        }

        return $data;
    }

    /**
     *  新增 開放的科目資料
     */
    public function set_access_subject()
    {
        if($this->input_data['uid'] AND $this->input_data['unlock'] AND is_array($this->input_data['unlock']))
        {
            $data = array();
            foreach($this->input_data['unlock'] as $v)
            {
                $data[] = array('uid'=> $this->input_data['uid'], 'subject_id'=> $v);
            }
            //以批次新增的方式處理
            SubjectAccess::insert($data);
        }
    }

    /**
     *  移除 開放的科目資料
     */
    public function unset_access_subject()
    {
        if($this->input_data['uid'] AND $this->input_data['lock'] AND is_array($this->input_data['lock']))
        {
            SubjectAccess::where('uid', $this->input_data['uid'])
                ->whereIn('subject_id', $this->input_data['lock'])
                ->delete();
        }
    }
}
