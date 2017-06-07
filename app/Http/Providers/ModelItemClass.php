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

}
