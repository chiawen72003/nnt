<?php

namespace App\Http\Models;

class UserStatus extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'user_status';
	protected $primaryKey = 'user_id';
	public $timestamps = false;
}
