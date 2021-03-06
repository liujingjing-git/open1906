<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo',function(){
    phpinfo();
});


/**注册登录 */
Route::prefix('/index')->group(function(){
    Route::get('/add','Admin\IndexController@add');  //注册视图
    Route::post('/store','Admin\IndexController@store'); //用户注册
    Route::get('/login','Admin\IndexController@login'); //登录视图
    Route::post('/logindo','Admin\IndexController@logindo'); //执行登录
    Route::get('/center','Admin\IndexController@center'); //个人中心
    Route::get('/AccessToken','Admin\IndexController@AccessToken');//获取到access_token
});

/*后台*/
Route::prefix('/admin')->group(function(){
    Route::get('/list','Admin\AdminController@list');  //展示用户
});

/*调用接口*/
Route::prefix('/api')->middleware('AccessToken')->group(function(){
    Route::get('/test','Admin\ApiController@test');  
});

/*实现第三方登录(GitHub)*/
Route::prefix('/github')->group(function(){
    Route::get('/index','Admin\GitHubController@index');   //GitHub登录页面
    Route::get('/callback','Admin\GitHubController@callback');   //用户授权回跳的页面
});