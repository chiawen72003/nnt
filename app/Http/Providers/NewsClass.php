<?php

namespace App\Http\Providers;

use App\Http\Models\NewsList;

class NewsClass
{
    public function __construct()
    {

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


}
