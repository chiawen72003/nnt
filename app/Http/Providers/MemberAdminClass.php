<?php

namespace App\Http\Providers;

use App\Http\Models\MemberAdmin;

class MemberAdminClass
{
    private $input_data = array(
        'id' => null,
        'name' => null,
        'login_name' => null,
        'login_pw' => null,
    );

    public function __construct($data = array())
    {
        foreach ($data as $key => $value) {
            $this -> input_data[$key] = $value;
        }
    }

    /**
     * 回傳列表
     *
     * @return mixed
     */
    public function get_list()
    {
        $temp_obj = MemberAdmin::select('id', 'login_name', 'name')
            ->paginate(5);

        return $temp_obj;
    }

    /**
     * 新增
     *
     * @return mixed
     */
    public function add()
    {
        if (
            $this -> input_data['name']
            AND $this -> input_data['login_name']
            AND $this -> input_data['login_pw']
        ) {
            $temp_obj = new MemberAdmin();
            $temp_obj->name = $this -> input_data['name'];
            $temp_obj->login_name = $this -> input_data['login_name'];
            $temp_obj->login_pw = base64_encode($this -> input_data['login_pw']);
            $temp_obj->save();

            return true;
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
        if (
            $this -> input_data['name']
            AND $this -> input_data['id']
        ) {
            MemberAdmin::where('id', $this -> input_data['id'])
                ->update(['name' => $this -> input_data['name']]);

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
        if ($this -> input_data['id']) {
            MemberAdmin::where('id', $this -> input_data['id'])->delete();

            return true;
        }

        return false;
    }

}
