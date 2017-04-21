<?php

namespace App\Http\Providers;

use App\Http\Models\City;
use App\Http\Models\Organization;

class SchoolClass
{
    private $input_data = array(
        'id' => null,
        'school_code' => null,
        'type' => null,
        'city_code' => null,
        'name' => null,
        'address' => null,
        'telno' => null,
        'used' => null,
    );

    public function __construct($data = array())
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 回傳學校列表
     *
     * @return mixed
     */
    public function get_school_list()
    {
        $temp_obj = Organization::select('id','school_code', 'type', 'city_code', 'name', 'address', 'telno', 'used')
            ->orderby('city_code', 'ASC')
            ->orderby('id', 'ASC')
            ->paginate(20);

        return $temp_obj;
    }

    /**
     * 回傳所有學校資料
     *
     * @return mixed
     */
    public function get_all_school()
    {
        $return_data = array();
        $temp_obj = Organization::select('id','school_code', 'type', 'city_code', 'name', 'address', 'telno', 'used')
            ->orderby('city_code', 'ASC')
            ->orderby('id', 'ASC')
            ->get();
        foreach($temp_obj as $v ){
            $return_data[] = $v;
        }

        return $return_data;
    }

    /**
     * 回傳一筆學校資訊
     *
     * @return mixed
     */
    public function get_school_data()
    {
        $return_data = array();
        if($this -> input_data['id']){
            $temp_obj = Organization::select('id','school_code', 'city_code', 'name')
                ->where('id', $this -> input_data['id'])
                ->get();
            foreach($temp_obj as $v)
            {
                $return_data = $v -> toArray();
            }
        }

        return $temp_obj;
    }


    /**
     * 新增 學校
     *
     * @return mixed
     */
    public function add()
    {
        if ($this->input_data['school_code']) {
            $temp_obj = Organization::where('school_code', $this->input_data['school_code'])->get();
            if (count($temp_obj) == 0) {
                $temp_obj = new Organization();
                $temp_obj->School_id = $this->input_data['school_code'] ? $this->input_data['school_code'] : '';
                $temp_obj->city_code = $this->input_data['city_code'] ? $this->input_data['city_code'] : '';
                $temp_obj->name = $this->input_data['name'] ? $this->input_data['name'] : '';
                $temp_obj->save();
            }
        }
    }

    /**
     * 更新
     *
     * @return mixed
     */
    public function update_data()
    {
        if ($this->input_data['id']) {
            Organization::where('id', $this->input_data['id'])
                ->update([
                    'city_code' => $this->input_data['city_code'] ? $this->input_data['city_code'] : '',
                    'name' => $this->input_data['name'] ? $this->input_data['name'] : '',
                    'school_code' => $this->input_data['school_code'] ? $this->input_data['school_code'] : '',
                ]);
        }
    }

    /**
     * 刪除
     *
     * @return mixed
     */
    public function delete_data()
    {
        if ($this->input_data['id']) {
            Organization::where('id', $this->input_data['id'])->delete();
        }
    }

    /**
     * 取得城市的資料
     *
     * @return array
     */
    public function get_all_city_data()
    {
        $return_array = array();
        $city_obj = City::get();
        foreach ($city_obj as $data){
            $return_array[$data['id']] = $data['city_name'];
        }

        return $return_array;
    }
}
