<?php

namespace App\Http\Models;

class UserStatus extends BaseModel
{
    protected $table = 'user_status';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
}
