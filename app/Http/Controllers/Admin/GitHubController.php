<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GitHubController extends Controller
{
    /**
     * 实现第三方登录  GitHub
     */
    public function index()
    {
        return view('github.index');
    }
}
