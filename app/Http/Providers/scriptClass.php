<?php

namespace App\Http\Providers;

use App\Http\Models\ScriptData;
use \Input;

class ScriptClass
{
    private $input_data = array(
        'id' => null,
        'uid' => null,
        'unlock' => null,
        'lock' => null,
    );

    private $result_msg = array(
        'message' => 'success',
    );

    public function init($data = array())
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 新增一筆單元資料
     *
     * @param array $insert_data 要新增的資料
     */
    public function scriptAdd($insert_data)
    {
        $temp_obj = new ScriptData();
        foreach ($insert_data as $key => $value){
            $temp_obj->$key = $value;
        }
        $temp_obj->save();
        $this -> result_msg['item_key'] = $insert_data['item_key'];

        return $this->result_msg;
    }


}
