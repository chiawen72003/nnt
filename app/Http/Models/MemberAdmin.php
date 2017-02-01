<?php

namespace App\Http\Models;

class MemberAdmin extends BaseModel {
	protected $table = 'member_admin';
	protected $primaryKey = 'id';
	public $timestamps = false;

    public static $input_data = array();

    public static function _init($data)
    {
        foreach ($data as $key => $value) {
            self::$input_data[$key] = $value;
        }
    }

    /**
     * 回傳列表
     *
     * @return mixed
     */
    public static function get_list()
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
    public static function add()
    {
        if (
            isset(self::$input_data['name'])
            AND isset(self::$input_data['login_name'])
            AND isset(self::$input_data['login_pw'])
        )
        {
            $temp_obj = new MemberAdmin();
            $temp_obj->name = self::$input_data['name'];
            $temp_obj->login_name = self::$input_data['login_name'];
            $temp_obj->login_pw = base64_encode(self::$input_data['login_pw']);
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
    public static function update_data()
    {
        if (
            isset(self::$input_data['name'])
            AND isset(self::$input_data['id'])
        ) {
            MemberAdmin::where('id', self::$input_data['id'])
                ->update(['name' => self::$input_data['name']]);

            return true;
        }

        return false;
    }

    /**
     * 刪除
     *
     * @return mixed
     */
    public static function delete_data()
    {
        if ( isset(self::$input_data['id']) )
        {
            MemberAdmin::where('id', self::$input_data['id'])->delete();

            return true;
        }

        return false;
    }
}
