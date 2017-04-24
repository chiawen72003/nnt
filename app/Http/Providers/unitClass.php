<?php

namespace App\Http\Providers;

use App\Http\Models\UnitList;
use \Input;

class UnitClass
{
    private $input_data = array(
        'id' => null,
        'unlock' => null,
        'lock' => null,
    );

    public function __construct()
    {
        $fp = Input::all();
        foreach ($fp as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }
    /**
     * 所有單元的資料
     */
    function get_all_unit()
    {
        $data = array();
        $t_obj = UnitList::orderBy('module_type')
            ->orderBy('subject')
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
}
