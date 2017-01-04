<?php

namespace App\Http\Models;

class ExamPaperAccess extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'exam_paper_access';
	protected $primaryKey = 'sn';
	public $timestamps = false;
}
