<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\RegisterModel;
use App\Model\AppModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;


class IndexController extends Controller
{
    /**
     * 用户注册视图页面
     */
    public function add()
    {
        return view('index.add');
    }
    /**
     * 用户注册
     */
    public function store()
    {
        $post = request()->except('_token');
        
        if(request()->hasFile('r_logo')) {
            $post['r_logo'] = $this->upload('r_logo');
        }

        $res = RegisterModel::create($post);

        $appid = AppModel::Appid($post['r_legal']);//生成appid
        $secret = AppModel::Secret();//生成Secret'
        $info = [
            'r_id' => $res['r_id'],
            'appid' => $appid,
            'secret' => $secret
        ];
        $id = AppModel::insertGetId($info);

        if($res){
            if($post['r_pwd']!==$post['r_pwd1']){
                echo "<script>alert('请保持两次输入的密码一致');location.href='add'</script>";
            }
            echo "<script>alert('注册成功');location.href='login'</script>";
        }else{
            echo "<script>alert('注册失败');location.href='add'</script>";
        }


    }
    /*文件上传*/
    public function upload($file)
    {
        $file = request()->file($file);
        $path = $file->store('public');
        $path = strstr($path,'/');
        return $path;
    }

    /** 
     * 登陆视图
     */
    public function login()
    {
        return view('index.login');
    }

    /**
     * 执行登录
     */
    public function logindo()
    {
        $post = request()->except('_token');
        // dd($post);
        $where[]=['r_legal','=',$post['r_legal']];
        $res = RegisterModel::where($where)->first();
        if($res == null){
            echo "<script>alert('该用户不存在 注册后再试');location.href='add'</script>";
        }
       
        $token = Str::random(16); //生成token 返回客户端
        Cookie::queue('token',$token,60);
        // 将token保存到redis中
        $redis_h_token = "h:token:" . $token;

        $login_info = [
            'r_id'           => $res->r_id,
            'r_legal'      => $res->r_legal,
            'login_time'    => time()
        ];
        Redis::hMset($redis_h_token,$login_info);
        Redis::expire($redis_h_token,60*60);

        if($res){
            if($post['r_pwd']!==$res['r_pwd'])
            {
                echo "<script>alert('密码有误');location.href='login'</script>";
            }
           echo "<script>alert('登录成功');location.href='center'</script>";
        }else{
            echo "<script>alert('登录失败');location.href='login'</script>";
        }
    }

    /**
     * 个人中心
     */
    public function center()
    {
        //判断信息
        $token = Cookie::get('token');
        if(empty($token)){
            echo "<script>alert('请先去登陆');location='/index/login'</script>";
        }  
        $redis_h_token = "h:token:".$token;
        
        $login_info = Redis::hgetAll($redis_h_token);
        $app_info = AppModel::where(['r_id'=>$login_info['r_id']])->first()->toArray();
        echo "欢迎来到个人中心:". $login_info['r_legal'];echo '</br>';
        echo "APPId:" .$app_info['appid'];echo '</br>';
        echo "SECRET:".$app_info['secret'];echo '</br>';
    }
}
