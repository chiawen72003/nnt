<?php

namespace App\Http\Providers;

use App\Http\Models\MemberAdmin;
use App\Http\Models\MemberStudent;
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
     *  檢查學生登入的資料
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
            $tempObj = MemberStudent::where('login_name', $user_id)
                ->where('login_pw', $pass)
                ->get();
            if (count($tempObj) == 1) {
                $user_data = array();
                foreach ($tempObj as $v) {
                    $user_data = array(
                        'user_id' => $v['id'],
                        'user_name' => $v['uname'],
                        'user_email' => $v['email'],
                        'school_grade' => $v['grade'],
                        'school_class' => $v['class'],
                        'organization_id' => $v['organization_id'],
                        'grade' => $v['grade'],
                        'class' => $v['class'],

                    );
                }
                $return_data['check_result'] = true;
                $return_data['user_data'] = $user_data;
            }
        }

        return $return_data;
    }

    /**
     * 檢查是否為管理員登入
     *
     * @return array
     */
    public function chk_ad_login_data()
    {
        $return_data = array(
            'check_result' => false,
            'user_data' => array(),
        );
        if (isset($this->input_data['username']) AND isset($this->input_data['password'])) {
            $user_id = $this->input_data['username'];
            $pass = base64_encode($this->input_data['password']);
            $tempObj = MemberAdmin::where('login_name', $user_id)
                ->where('login_pw', $pass)
                ->get();
            if (count($tempObj) == 1) {
                $user_data = array();
                foreach ($tempObj as $v) {
                    $user_data = array(
                        'login_name' => $v['login_name'],
                        'name' => $v['name']
                    );
                }
                $return_data['check_result'] = true;
                $return_data['user_data'] = $user_data;
            }
        }

        return $return_data;
    }

}
