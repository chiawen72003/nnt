<?php

namespace App\Http\Models;

class UserInfo extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'user_info';
	protected $primaryKey = 'uid';
	public $timestamps = false;
}
