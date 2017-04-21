<?php

namespace App\Http\Providers;

use App\Http\Models\UserInfo;
use App\Http\Models\UserStatus;
use App\Http\Models\UserAccess;
use \Input;

class MemberClass
{
    private $input_data = array(
        'uid' => null,
        'user_id' => null,
        'uname' => null,
        'email' => null,
        'sex' => null,
        'user_regdate' => null,
        'birthday' => null,
        'organization_id' => null,
        'pass' => null,
        'viewpass' => null,
        'city_code' => null,
        'grade' => null,
        'class' => null,
        'identity' => null,
        'tel' => null,
        'mobil' => null,
        'address' => null,
        'class_group' => null,
        'seme' => null,
    );

    public function __construct()
    {
        $fp = Input::all();
        foreach ($fp as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 登入檢查
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
     * 使用者等級的設定資料
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
     * 指定使用者的等級
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

    /**
     * 新增使用者
     */
    public function set_add_user()
    {
        if($this->input_data['user_id'] AND $this->input_data['pass'] ) {
            $t_obj = new UserInfo();
            $t_obj->user_id = ($this->input_data['user_id']) ? $this->input_data['user_id'] : '';
            $t_obj->uname = ($this->input_data['uname']) ? $this->input_data['uname'] : '';
            $t_obj->email = ($this->input_data['email']) ? $this->input_data['email'] : '';
            $t_obj->sex = ($this->input_data['sex']) ? $this->input_data['sex'] : '';
            $t_obj->user_regdate = ($this->input_data['user_regdate']) ? $this->input_data['user_regdate'] : '';
            $t_obj->birthday = ($this->input_data['birthday']) ? $this->input_data['birthday'] : '';
            $t_obj->organization_id = ($this->input_data['organization_id']) ? $this->input_data['organization_id'] : '';
            $t_obj->pass = ($this->input_data['pass']) ? md5($this->input_data['pass']) : '';
            $t_obj->viewpass = ($this->input_data['viewpass']) ? $this->input_data['viewpass'] : '';
            $t_obj->city_code = ($this->input_data['city_code']) ? $this->input_data['city_code'] : '0';
            $t_obj->grade = ($this->input_data['grade']) ? $this->input_data['grade'] : '0';
            $t_obj->class = ($this->input_data['class']) ? $this->input_data['class'] : '0';
            $t_obj->identity = ($this->input_data['identity']) ? $this->input_data['identity'] : '';
            $t_obj->tel = ($this->input_data['tel']) ? $this->input_data['tel'] : '';
            $t_obj->mobil = ($this->input_data['mobil']) ? $this->input_data['mobil'] : '';
            $t_obj->address = ($this->input_data['address']) ? $this->input_data['address'] : '';
            $t_obj->class_group = ($this->input_data['class_group']) ? $this->input_data['class_group'] : '';
            $t_obj->seme = ($this->input_data['seme']) ? $this->input_data['seme'] : '';
            $t_obj->save();
        }
    }

    /**
     * 單一使用者的資料
     */
    public function get_user_data()
    {
        $return_data = array();
        if($this->input_data['uid']) {
            $t_obj = UserInfo::where('uid', $this->input_data['uid'])
                ->get();
            foreach($t_obj as $v)
            {
                $return_data = $v->toArray();
            }
        }

        return $return_data;
    }
}
