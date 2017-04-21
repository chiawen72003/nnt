<?php

namespace App\Http\Models;

class UserInfo extends BaseModel
{
    protected $table = 'user_info';
    protected $primaryKey = 'uid';
    public $timestamps = false;
}
