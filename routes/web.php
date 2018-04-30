<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//测试文本
Route::get('text', function () {
    return config('app.timezone');
});

//测试数据库相关
Route::get('test', function () {
    $test =  new \App\Blog();
    $test->deleteBlog(4);
    return '已删除';
});

//首页
Route::get('/','Controller@index');

//博客资源控制器
Route::resource('blog','BlogController');

//分类资源控制器
Route::resource('classify','ClassifyController');

//用户资源控制器
Route::resource('user','UserController');

//评论资源控制器
Route::resource('discuss','DiscussController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//修改个人信息请求
Route::post('/changeSelfInfoSubmit', 'UserController@changeSelfInfoSubmit');

//修改密码页面
Route::get('/changePassword', 'UserController@changePassword');

//修改密码请求
Route::post('/changePasswordSubmit', 'UserController@changePasswordSubmit');
