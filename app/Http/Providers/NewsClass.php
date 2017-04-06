<?php

namespace App\Http\Providers;

use App\Http\Models\NewsList;
use Illuminate\Support\Facades\Storage;

class NewsClass
{
    private $input_array = array(
        'id' => null
    );

    public function __construct($input_data = array())
    {
        foreach($input_data as $k => $v){
            $this->input_array[$k] = $v;
        }
    }

    /**
     * 取得 系統公告列表
     *
     * @return Array $list_data 系統公告資料
     */
    public function get_news_list()
    {
        $list_data = array();
        $temp_obj = NewsList::orderBy('id','DESC')
            ->get();
        foreach ($temp_obj as $value) {
            $list_data[] = $value;
        }

        return $list_data;
    }


    /**
     * 移除一筆系統資料
     *
     */
    public function delete_data()
    {
        if($this->input_array['id'])
        {
            $temp_data = NewsList::where('id',$this->input_array['id'])->get();
            foreach ($temp_data as $v){
                if($v['file_path'] > '' AND file_exists('upfire/file'.$v['file_path']))
                {
                    unlink('upfire/file'.$v['file_path']);
                }
            }
            NewsList::destroy($this->input_array['id']);
        }

        return ;
    }
}
