<?php

namespace App\Http\Models;

class UserAccess extends BaseModel
{
    protected $table = 'user_access';
    protected $primaryKey = 'access_level';
    public $timestamps = false;
}
