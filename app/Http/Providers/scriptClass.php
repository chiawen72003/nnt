<?php

namespace App\Http\Providers;

use App\Http\Models\ScriptData;//教師填寫的資料
use App\Http\Models\ScriptAdminData;//管理員填寫的資料
use App\Http\Models\ScriptPrompt;//提示資料
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

    private $result_data = array(
        'teacher' => array(),
        'admin' => array(),
    );

    public function init($data = array())
    {
        foreach ($data as $key => $value) {
            $this->input_data[$key] = $value;
        }
    }

    /**
     * 統計指定uid的文章數量(只針對教師填寫的資料)
     *
     * @param int $user_id
     */
    public function getTeacherScriptNum($user_id)
    {
        $result_data = array();
        //教師寫的資料
        $t = ScriptData::where('uid', $user_id)
            ->select(
                'item_key',
                'updated_at'
            )
            ->get();
        foreach ($t as $v){
            if(!isset($result_data[$v['item_key']])){
                $result_data[$v['item_key']] = 0;
            }
            $result_data[$v['item_key']]++;
        }

        return $result_data;
    }

    /**
     * 回傳指定uid的填寫資料(包含教師填寫的資料跟管理員填寫的資料)
     *
     * @param int $user_id 
     */
    public function getUserScriptData($user_id)
    {
        $t_array = array();
        //教師寫的資料
         $t = ScriptData::where('uid', $user_id)
            ->select(
                'item_key',
                'dsc',
                'updated_at'
            )
            ->orderBy('id','DESC')
            ->get();
        foreach ($t as $v){
            if(!isset($t_array[$v['item_key']])){
                $this->result_data['teacher'][] = $v;
                $t_array[$v['item_key']] = true;
            }
        }
        //管理員寫的資料
        $t_array = array();
        $t = ScriptAdminData::where('uid', $user_id)
            ->select(
                'item_key',
                'dsc',
                'updated_at'
            )
            ->orderBy('id','DESC')
            ->get();
        foreach ($t as $v){
            if(!isset($t_array[$v['item_key']])) {
                $this->result_data['admin'][] = $v;
                $t_array[$v['item_key']] = true;
            }
        }
        $this -> result_msg['script_data'] = $this->result_data;

        return $this->result_msg;
    }

    /**
     * 根據item_key回傳資料(包含教師填寫的資料跟管理員填寫的資料)
     *
     * @param array $insert_data 要新增的資料
     */
    public function getScriptData($user_id,$item_key)
    {
        //教師寫的資料
         $t = ScriptData::where('uid', $user_id)
            ->where('item_key', $item_key)
            ->select(
                'uid',
                'item_key',
                'dsc'
            )
            ->orderBy('id','desc')
            ->limit(1)
            ->get();
        foreach ($t as $v){
            $this->result_data['teacher'] = $v;
        }
        //管理員寫的資料
        $t = ScriptAdminData::where('uid', $user_id)
            ->where('item_key', $item_key)
            ->select(
                'uid',
                'item_key',
                'dsc'
            )
            ->orderBy('id','desc')
            ->limit(1)
            ->get();
        foreach ($t as $v){
            $this->result_data['admin'] = $v;
        }
        $this -> result_msg['item_key'] = $item_key;
        $this -> result_msg['script_data'] = $this->result_data;

        return $this->result_msg;
    }

    /**
     * 新增一筆 教師填寫的資料
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
        $this -> result_msg['updated_at'] = time();

        return $this->result_msg;
    }

    /**
     * 新增一筆 管理員填寫的資料
     *
     * @param array $insert_data 要新增的資料
     */
    public function scriptAdminAdd($insert_data)
    {
        $temp_obj = new ScriptAdminData();
        foreach ($insert_data as $key => $value){
            $temp_obj->$key = $value;
        }
        $temp_obj->save();
        $this -> result_msg['item_key'] = $insert_data['item_key'];

        return $this->result_msg;
    }

    /**
     * 回傳有填寫資料的教師資料
     *
     */
    public function teacher_list()
    {
        $t_obj = array(
            'teacher_data' => array(),
            'page_data' => '',
        );
        $temp_obj =
            ScriptData::select('user_info.user_id', 'user_info.uid', 'user_info.uname')
            ->leftJoin('user_info', 'user_info.uid', '=', 'script_data.uid')
            ->leftJoin('user_status', 'user_status.user_id', '=', 'user_info.user_id')
            ->whereIn('user_status.access_level', array('21','22','23'))
            ->groupBy('script_data.uid')
            ->orderBy('user_info.uname')
            ->paginate(20);
        foreach ($temp_obj as $v)
        {
            $t_obj['teacher_data'][] = $v->toArray();
        }
        if(count($temp_obj) > 0)
        {
            $t_obj['page_data'] = $temp_obj -> links();
        }

        return $t_obj;
    }


    /**
     * 取得最新的批閱資料
     *
     */
    public function getChkData($data = array())
    {
        $t_obj = array();
        $t_array = array();
        if(isset($data['uid'])){
            $t = ScriptAdminData::where('uid', $data['uid'])
            ->select(
            'item_key',
            'dsc',
            'updated_at'
            )
            ->orderBy('id','desc')
            ->get();
            foreach ($t as $v){
                if(!isset($t_array[$v['item_key']])){
                    $t_obj[] = array(
                        'item_key' => $v['item_key'],
                        'dsc' => $v['dsc'],
                        'updated_at' => $v['updated_at'],
                    );
                    $t_array[$v['item_key']] = true;
                }
            }
        }
        $this->result_msg['chkData'] = $t_obj; 

        return $this->result_msg;
    }

    /**
     * 取得教學劇本各欄位的提示資料
     *
     */
    public function getPrompt($set_key = false)
    {
        $t_obj = array();
        $t = ScriptPrompt::select(
        'item_key',
        'dsc'
        )
        ->orderBy('item_key','asc')
        ->get();
        if($set_key){
            foreach ($t as $v){
                $t_obj[$v['item_key']] = $v['dsc'];
            }
        }else{
            foreach ($t as $v){
                $t_obj[] = $v;
            }
        }

        return $t_obj;
    }

    /**
     * 取得單一批閱資料 根據item_key回傳提示資料
     *
     * @param array $insert_data 要新增的資料
     */
    public function getPromptData($item_key)
    {
       $t_obj = array();
        $t = ScriptPrompt::where('item_key', $item_key)
        ->select(
        'id',
        'item_key',
        'dsc'
        )
        ->get();
        foreach ($t as $v){
            $t_obj[] = $v;
        }
        

        return $t_obj;
    }

    public function setPromptData(){
        if($this->input_data['item_key'] AND $this->input_data['dsc'])
        {
            ScriptPrompt::where('item_key',$this->input_data['item_key'])
                ->update(['dsc' => $this->input_data['dsc']]);
        }

        return ;
    }
}
