<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegisterModel extends Model
{
    protected $table = 'register';
    protected $guarded = []; 
    protected $primaryKey = "r_id";

}
