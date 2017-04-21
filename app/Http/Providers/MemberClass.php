<?php

namespace App\Http\Providers;

use App\Http\Models\UserInfo;
use App\Http\Models\UserStatus;
use App\Http\Models\UserAccess;
use \Input;

class MemberClass
{
    public $input_data = array();

    public function __construct()
    {
        $fp = Input::all();
        foreach ($fp as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     *  檢查登入的資料
     *
     * @return array
     */
    public function chk_login_data()
    {
        $return_data = array(
            'check_result' => false,
            'user_data' => array(),
        );
        if (isset($this->input_data['username']) AND isset($this->input_data['password'])) {
            $user_id = $this->input_data['username'];
            $pass = md5($this->input_data['password']);
            $tempObj = UserInfo::where('user_id', $user_id)
                ->where('pass', $pass)
                ->get();
            if (count($tempObj) == 1) {
                $user_data = array();
                foreach ($tempObj as $v) {
                    $user_data = $v->toArray();
                }
                $user_data['access_level'] = $this ->get_access_level($v['user_id']);
                $return_data['check_result'] = true;
                $return_data['user_data'] = $user_data;
            }
        }

        return $return_data;
    }


    /**
     * 取得使用者等級的設定資料
     *
     * @return int
     */
    public function get_all_level()
    {
        $return_data = array();
        $tempObj = UserAccess::get();
        foreach ($tempObj as $v)
        {
            $return_data[] = $v;
        }

        return $return_data;
    }

    /**
     * 取得指定使用者的等級資料
     *
     * @param $user_id
     * @return int
     */
    public function get_access_level($user_id)
    {
        $access_level = 0;
        $tempObj = UserStatus::where('user_id', $user_id)
            ->get();
        foreach ($tempObj as $v)
        {
            $access_level = $v['access_level'];
        }

        return $access_level;
    }
}
