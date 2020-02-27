<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\RegisterModel;

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

        $res = RegisterModel::insert($post);
        // dd($res);die;
       
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
        // dd($res);
        if($res){
            if($post['r_pwd']!==$res['r_pwd']){
                echo "<script>alert('密码有误');location.href='login'</script>";
            }
           echo "<script>alert('登录成功');location.href='index'</script>";
        }else{
            echo "<script>alert('登录失败');location.href='login'</script>";
        }
    }
}
