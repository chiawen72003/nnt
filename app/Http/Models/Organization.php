<?php

namespace App\Http\Models;

class Organization extends BaseModel {
	protected $table = 'organization';
	protected $primaryKey = 'organization_id';
	public $timestamps = true;
}
