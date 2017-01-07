<?php

namespace App\Http\Models;

class MadItem extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'mad_item';
	protected $primaryKey = 'sn';
	public $timestamps = false;
}
