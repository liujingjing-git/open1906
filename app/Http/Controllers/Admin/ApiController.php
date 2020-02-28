<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function test()
    {
        $data = [
            'name' => 'wangyibo',
            'sex' => 'nan',
            'time' => date('Y:m:d H:i:s')
        ];
        return $data;
    }
}
