<?php

namespace App\Http\Models;

class ExamRecord extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'exam_record';
	protected $primaryKey = 'exam_sn';
	public $timestamps = false;
}
