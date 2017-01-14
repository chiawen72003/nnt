<?php

namespace App\Http\Models;

class ConceptItem extends BaseModel {
	//protected $connection = 'mysql_2';
	protected $table = 'concept_item';
	protected $primaryKey = 'item_sn';
	public $timestamps = false;
}
