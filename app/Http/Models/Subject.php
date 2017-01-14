<?php

namespace App\Http\Models;

class Subject extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'subject';
	protected $primaryKey = 'subject_id';
	public $timestamps = false;
}
