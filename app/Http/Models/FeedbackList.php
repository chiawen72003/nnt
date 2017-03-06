<?php

namespace App\Http\Models;

class FeedbackList extends BaseModel {
	protected $table = 'feedback_list';
	protected $primaryKey = 'id';

	public function get_list_data()
    {
        $return_array = array();
        $t = FeedbackList::get();
        foreach($t as $v)
        {
            $return_array[$v['id']] = $v['name'];
        }

        return $return_array;
    }
}
