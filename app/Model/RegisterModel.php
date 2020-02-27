<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table = 'register';
    protected $guarded = []; 
    protected $primaryKey = "r_id";
}
