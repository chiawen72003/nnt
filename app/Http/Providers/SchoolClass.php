<?php

namespace App\Http\Providers;

use App\Http\Models\City;
use App\Http\Models\Organization;

class SchoolClass
{
    private $use_data = array(
        'School_id' => null,
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
     * 回傳科目列表
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
     * 新增 學校
     *
     * @return mixed
     */
    public function add()
    {
        if ($this->input_data['School_id']) {
            $temp_obj = Organization::where('School_id', $this->input_data['School_id'])->get();
            if (count($temp_obj) == 0) {
                $temp_obj = new Organization();
                $temp_obj->School_id = $this->input_data['School_id'] ? $this->input_data['School_id'] : '';
                $temp_obj->type = $this->input_data['type'] ? $this->input_data['type'] : '';
                $temp_obj->city_code = $this->input_data['city_code'] ? $this->input_data['city_code'] : '';
                $temp_obj->name = $this->input_data['name'] ? $this->input_data['name'] : '';
                $temp_obj->address = $this->input_data['address'] ? $this->input_data['address'] : '';
                $temp_obj->telno = $this->input_data['telno'] ? $this->input_data['telno'] : '';
                $temp_obj->used = $this->input_data['used'] ? $this->input_data['used'] : '';
                $temp_obj->save();

                return true;
            }
        }

        return false;
    }

    /**
     * 更新
     *
     * @return mixed
     */
    public function update_data()
    {
        if ($this->input_data['School_id']) {
            Organization::where('School_id', $this->input_data['School_id'])
                ->update([
                    'type' => $this->input_data['type'] ? $this->input_data['type'] : '',
                    'city_code' => $this->input_data['city_code'] ? $this->input_data['city_code'] : '',
                    'name' => $this->input_data['name'] ? $this->input_data['name'] : '',
                    'address' => $this->input_data['address'] ? $this->input_data['address'] : '',
                    'telno' => $this->input_data['telno'] ? $this->input_data['telno'] : '',
                    'used' => $this->input_data['used'] ? $this->input_data['used'] : ''
                ]);

            return true;
        }

        return false;
    }

    /**
     * 刪除
     *
     * @return mixed
     */
    public function delete_data()
    {
        if ($this->input_data['School_id']) {
            Organization::where('School_id', $this->input_data['School_id'])->delete();

            return true;
        }

        return false;
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
