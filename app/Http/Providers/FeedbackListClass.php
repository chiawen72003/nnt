<?php

namespace App\Http\Providers;

use App\Http\Models\FeedbackList;

class FeedbackListClass
{
    public function get_list_data()
    {
        $return_array = array();
        $t = FeedbackList::get();
        foreach ($t as $v) {
            $return_array[$v['id']] = $v['name'];
        }

        return $return_array;
    }
}
