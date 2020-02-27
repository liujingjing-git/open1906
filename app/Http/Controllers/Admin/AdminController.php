<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RegisterModel;

class AdminController extends Controller
{
    /**
     * 后台管理
     */
    public function list()
    {
        $data = RegisterModel::paginate(2);
        return view('admin.list',['data'=>$data]);
    }
}
