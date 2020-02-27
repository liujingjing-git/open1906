<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AppModel extends Model
{
    protected $table = 'app';
    protected $guarded = []; 
    protected $primaryKey = "id";

    /*生成appid   根据用户名 时间 随机数 */
    public static function Appid($r_legal)
    {
        return  'liu'.substr(md5($r_legal.time().mt_rand(11111,99999)),5,13);
    }
    /*生成secret  */
    public static function Secret(){
        return Str::random(32);
    }
    
}
