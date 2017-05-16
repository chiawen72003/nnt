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
        'access_level'=>null,
        'import_user_file'=>null,
    );

    public function __construct()
    {
        $fp = Input::all();
        foreach ($fp as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    public function init($data)
    {
        foreach ($data as $key => $value) {
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
            $return_data[$v['access_level']] = $v['access_title'];
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
        if($this->input_data['user_id'] AND $this->input_data['pass'] )
        {
            $temp_obj = UserInfo::where('user_id',$this->input_data['user_id'])
                ->get();
            if(count($temp_obj) == 0)
            {
                $t_obj = new UserInfo();
                $t_obj->user_id = ($this->input_data['user_id']) ? $this->input_data['user_id'] : '';
                $t_obj->uname = ($this->input_data['uname']) ? $this->input_data['uname'] : '';
                $t_obj->email = ($this->input_data['email']) ? $this->input_data['email'] : '';
                $t_obj->sex = ($this->input_data['sex']) ? $this->input_data['sex'] : '';
                $t_obj->user_regdate =  date("Y-m-d");
                $t_obj->user_regdate = ($this->input_data['user_regdate']) ? $this->input_data['user_regdate'] : '';
                $t_obj->birthday = ($this->input_data['birthday']) ? $this->input_data['birthday'] : '';
                $t_obj->organization_id = ($this->input_data['organization_id']) ? $this->input_data['organization_id'] : '';
                $t_obj->pass = ($this->input_data['pass']) ? md5($this->input_data['pass']) : '';
                $t_obj->viewpass = ($this->input_data['pass']) ? $this->input_data['pass'] : '';
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

                $t_obj = new UserStatus();
                $t_obj->user_id = ($this->input_data['user_id']) ? $this->input_data['user_id'] : '';
                $t_obj->access_level = ($this->input_data['access_level']) ? $this->input_data['access_level'] : '';
                $t_obj->save();
            }
        }
    }

    /**
     * 更新單一使用者資料
     */
    public function update_user_data()
    {
        $t_obj = UserInfo::where('uid', $this->input_data['uid'])
            ->update([
                'uname' => $this->input_data['uname'],
                'sex' => $this->input_data['sex'],
                'pass' => md5($this->input_data['pass']),
            ]);
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

    /**
     * 指定所屬學校下班級內所有成員的資料[有包含分頁資料]
     */
    public function get_class_member()
    {
        $t_obj = null;
        if($this->input_data['organization_id']  AND $this->input_data['grade'] AND $this->input_data['class'])
        {
            $temp_obj = UserInfo::leftJoin('user_status', 'user_status.user_id', '=', 'user_info.user_id')
                ->where('user_info.organization_id', $this->input_data['organization_id'])
                ->where('user_info.grade', $this->input_data['grade'])
                ->where('user_info.class', $this->input_data['class'])
                ->orderby('user_info.user_id', 'ASC')
                ->paginate(20);
            foreach ($temp_obj as $v)
            {
                $t_obj['member_data'][] = $v;
            }
            if(count($temp_obj) > 0)
            {
                $t_obj['page_data'] = $temp_obj -> appends([
                    'city_code' => $this->input_data['city_code'],
                    'organization_id' => $this->input_data['organization_id'],
                    'grade' => $this->input_data['grade'],
                    'class' => $this->input_data['class']
                ])->links();
            }
        }

        return $t_obj;
    }

    /**
     * 指定學校、班級的學生資料[有包含分頁資料]
     */
    public function get_class_student_data()
    {
        $t_obj = null;
        if($this->input_data['organization_id']  AND $this->input_data['grade'] AND $this->input_data['class'])
        {
            $temp_obj = UserInfo::leftJoin('user_status', 'user_status.user_id', '=', 'user_info.user_id')
                ->whereIn('user_status.access_level', array(1,2,3,8,9))
                ->where('user_info.organization_id', $this->input_data['organization_id'])
                ->where('user_info.grade', $this->input_data['grade'])
                ->where('user_info.class', $this->input_data['class'])
                ->orderby('user_info.uid', 'ASC')
                ->paginate(20);
            foreach ($temp_obj as $v)
            {
                $t_obj['student_data'][] = $v;
            }
            if(count($temp_obj) > 0)
            {
                $t_obj['page_data'] = $temp_obj -> appends([
                    'city_code' => $this->input_data['city_code'],
                    'organization_id' => $this->input_data['organization_id'],
                    'grade' => $this->input_data['grade'],
                    'class' => $this->input_data['class']
                ])->links();
            }
        }

        return $t_obj;
    }

    /**
     * 指定學校-班級的所有學生資料[不包含分頁資料]
     */
    public function get_all_class_student_data()
    {
        $t_obj = null;
        if($this->input_data['organization_id']  AND $this->input_data['grade'] AND $this->input_data['class'])
        {
            $temp_obj = UserInfo::leftJoin('user_status', 'user_status.user_id', '=', 'user_info.user_id')
                ->whereIn('user_status.access_level', array(1,2,3,8,9))
                ->where('user_info.organization_id', $this->input_data['organization_id'])
                ->where('user_info.grade', $this->input_data['grade'])
                ->where('user_info.class', $this->input_data['class'])
                ->orderby('user_info.uid', 'ASC')
                ->get();
            foreach ($temp_obj as $v)
            {
                $t_obj[] = $v;
            }
        }

        return $t_obj;
    }

    /**
     * 移除一個學生
     */
    function set_remove_student()
    {
        $t_obj = UserStatus::where('user_id', $this->input_data['user_id'])
            ->update([
                'access_level' => '-1',
            ]);
    }

    /**
     * 移除一個班級的學生
     */
    function set_remove_all_student()
    {
        if($this->input_data['organization_id']  AND $this->input_data['grade'] AND $this->input_data['class'])
        {
            UserInfo::leftJoin('user_status', 'user_status.user_id', '=', 'user_info.user_id')
                ->where('user_status.access_level', '1')
                ->where('user_info.organization_id', $this->input_data['organization_id'])
                ->where('user_info.grade', $this->input_data['grade'])
                ->where('user_info.class', $this->input_data['class'])
                ->update([
                    'user_status.access_level' => '-1',
                ]);
        }
    }

    /**
     * 所有教師的資料
     */
    function get_teacher_data()
    {
        $teacher_data = array();
        $t_obj = UserInfo::select('user_info.user_id', 'user_info.uid', 'user_status.access_level')
            ->leftJoin('user_status', 'user_status.user_id', '=', 'user_info.user_id')
            ->whereIn('user_status.access_level', array('21','22','23'))
            ->orderBy('user_info.user_id')
            ->get();
        foreach ($t_obj as $v)
        {
            $teacher_data[] = $v->toArray();
        }

        return $teacher_data;
    }

    /**
     * 從excel匯入學生的檔案
     */
    function get_import_student()
    {
        if(
            $this -> input_data['city_code']
            AND $this -> input_data['organization_id']
            AND $this -> input_data['grade']
            AND $this -> input_data['class']
            AND $this -> input_data['access_level']
            AND $this -> input_data['import_user_file']
        )
        {
            if ( $this -> input_data['import_user_file'] ->isValid() )
            {
                $extension = $this -> input_data['import_user_file'] -> getClientOriginalExtension(); // getting image extension
                $fileName = time().'.'.$extension; // renameing image
                $this -> input_data['import_user_file'] -> move('upfire/tmp/', $fileName); // uploading file to given path
                $this -> input_data['import_file_name'] = 'upfire/tmp/'.$fileName;

                $excel_obj = new PhpExcel();
                $excel_obj -> init($this -> input_data);
                $cell_data = $excel_obj -> import_student_data();
                $user_info = null;
                $user_status = null;
                //系統產生登入帳號
                $t_id = time();
                $data_total = count($cell_data);
                if($data_total > 0)
                {
                    $user_info = array();
                    $user_status = array();
                    for($x=0;$x<$data_total;$x++ )
                    {
                        if(
                            $data_total[x]['B']
                            AND $data_total[x]['C']
                            AND $data_total[x]['D']
                            AND $data_total[x]['E']
                            AND $data_total[x]['F']
                            AND $data_total[x]['G']
                            AND $data_total[x]['H']
                            AND $data_total[x]['I']
                            AND $data_total[x]['J']
                            AND $data_total[x]['K']
                        )
                        {
                            //todo 需要調整插入欄位的內容值
                            $user_info[] = array(
                                'user_id' => ($t_id + $x),
                                'user_id' => is_null($data_total[x]['B'])?$data_total[x]['B']:'',
                                'user_id' => is_null($data_total[x]['C'])?$data_total[x]['C']:'',
                                'user_id' => is_null($data_total[x]['D'])?$data_total[x]['D']:'',
                                'user_id' => is_null($data_total[x]['E'])?$data_total[x]['E']:'',
                                'user_id' => is_null($data_total[x]['F'])?$data_total[x]['F']:'',
                                'user_id' => is_null($data_total[x]['G'])?$data_total[x]['G']:'',
                                'user_id' => is_null($data_total[x]['H'])?$data_total[x]['H']:'',
                                'user_id' => is_null($data_total[x]['I'])?$data_total[x]['I']:'',
                                'user_id' => is_null($data_total[x]['J'])?$data_total[x]['J']:'',
                                'user_id' => is_null($data_total[x]['K'])?$data_total[x]['K']:'',
                            );
                            $user_status[] = array(
                                'user_id' => ($t_id + $x),
                                'access_level' => $this -> input_data['access_level']
                            );
                        }
                    }
                    //以批次新增的方式處理
                    UserInfo::insert($user_info);
                    UserStatus::insert($user_status);
                }
            }
        }
    }
}
