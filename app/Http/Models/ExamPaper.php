<?php

namespace App\Http\Models;

class ExamPaper extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'exam_paper';
	protected $primaryKey = 'sn';
	public $timestamps = false;
}
