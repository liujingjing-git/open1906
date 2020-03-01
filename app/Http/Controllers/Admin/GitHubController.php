<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;

class GitHubController extends Controller
{
    /**
     * 实现第三方登录  GitHub
     */
    public function index()
    {
        return view('github.index');
    }

    /**
     * 授权回调页面
     */
    public function callback()
    {
        
        // echo "<pre>";print_r($_GET);echo "</pre>";

        //获取code  github给的code
        $code = $_GET['code'];
        // dd($code);
        //用code去GitHub接口 获取access_token
        $client = new Client();
        $uri = 'https://github.com/login/oauth/access_token';
        $a=$client->request('POST',$uri,[
            'headrs' => [
                'Accept' => 'application/json'
            ],
            
            'form_params' => [
                'client_id' => env('GITHUB_CLIENT_ID'),
                'client_secret' => env('GITHUB_CLIENT_SECRET'),
                'code' => $code
            ]
        ]);
        $body = $a->getBody();
        // echo $body;echo "<br>";
        $info = json_decode($body,true);
        $access_token = $info['access_token'];

        
        //使用access_token来获取用户信息
        $uri = "https://api.github.com/user";
        $b = $client->request('GET',$uri,[
            'headers'=>[
                'Authorization'  =>'token '.$access_token
            ]
        ]);
        $res = $b->getBody();
        $user_info = json_decode($res,true);
        echo $user_info;
    }
}
