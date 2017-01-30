<?php

namespace App\Http\Models;

class Subject extends BaseModel
{
    protected $table = 'subject';
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
     * 回傳科目列表
     *
     * @return mixed
     */
    public static function get_list()
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
    public static function add()
    {
        if (isset(self::$input_data['name'])) {
            $temp_obj = new Subject();
            $temp_obj->name = self::$input_data['name'];
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
    public static function update_data()
    {
        if (
            isset(self::$input_data['name'])
            AND isset(self::$input_data['id'])
        ) {
            Subject::where('id', self::$input_data['id'])
                ->update(['name' => self::$input_data['name']]);

            return true;
        }

        return false;
    }

    /**
     * 刪除 科目
     *
     * @return mixed
     */
    public static function delete_data()
    {
        if ( isset(self::$input_data['id']) )
        {
            Subject::where('id', self::$input_data['id'])->delete();

            return true;
        }

        return false;
    }
}
