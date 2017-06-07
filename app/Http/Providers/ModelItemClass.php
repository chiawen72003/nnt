<?php

namespace App\Http\Providers;

use App\Http\Models\ModelItem;

class ModelItemClass
{
    private $input_data = array(
        'id' => null,
    );

    public function init($data = array())
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 回傳模組列表
     *
     * @return mixed
     */
    public function get_model_list()
    {
        $list = array();
        $temp_obj = ModelItem::select('id','name', 'dsc')
            ->get();
        foreach ($temp_obj as $v)
        {
            $list[] = $v -> toArray();
        }

        return $list;
    }

    /**
     * 回傳模組名稱
     *
     * @return mixed
     */
    public function get_model_filename()
    {
        $model_name = null;
        $temp_obj = ModelItem::select('file_name')
            ->where('id', $this->input_data['id'])
            ->get();
        foreach ($temp_obj as $v)
        {
            $model_name = $v['file_name'];
        }

        return $model_name;
    }
}
