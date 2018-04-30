<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $userC = new \App\User();
            $user = $userC->getAllUser();
            return view('userList', compact('user'));
        }else{
            return "您没有访问该页权限";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return 'store';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userC = new \App\User();
        $user = $userC->getUser($id);
        return view('userInfo', compact('user'));
    }

    //修改个人信息请求
    public function changeSelfInfoSubmit(Request $request)
    {
        $userID = $request->user_id;
        if(Auth::id() == $userID){
            $qq = $request->qq;
            $name = $request->name;
            $makeFriends = $request->make_friends;
            $selfInfo = $request->self_info;
            $userC = new \APP\User();
            $userC->where('id',$userID)->update([
                'qq' => $qq, 'name' => $name,
                'make_friends' => $makeFriends,
                'self_info' => $selfInfo
            ]);
            echo "<script>alert(\"保存成功\")</script>";
            $user = $userC->getUser($userID);
            return view('userInfo', compact('user'));
        }else{
            return "操作失败";
        }
    }

    //修改密码页
    public function changePassword(Request $request)
    {
        $userID = $request->id;
        if(Auth::id() == $userID){
            $userC = new \APP\User();
            $user = $userC->getUser($userID);
            return view('ChangePassword', compact('user'));
        }else{
            return '您没有操作权限';
        }


    }

    //修改密码请求
    public function changePasswordSubmit(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        $newPassword = $request->newPassword;
        $newPassword2 = $request->newPassword2;
        if(Auth::id() == $id){
            $userC = new \APP\User();
            $user = $userC->getUser($id);
            $oldPassword = $user->password;
            if(!Hash::check($password, $oldPassword)){
                return "原密码错误！";
            }
            if($newPassword != $newPassword2){
                return "两次密码不一致！";
            }
            $userC->where('id', $id)->update(['password' => bcrypt($newPassword)]);
            echo "<script>alert(\"修改成功\")</script>";
            return view('userInfo', compact('user'));
        }else{
            return "您没有操作权限";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $userC = new \APP\User();
            $user = $userC->getUser($id);
            return view('changeUser', compact('user'));
        }else{
            return "您没有访问该页权限";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $name = $request->name;
            $password = $request->password;
            $userC = new \APP\User();
            $userC->where('id', $id)->update(['name' => $name]);

            if($password != ''){
                $userC->where('id', $id)->update(['password' => bcrypt($password)]);
            }
            echo "<script>alert(\"编辑成功\")</script>";
            $user= $userC->getAllUser();
            return view('userList', compact('user'));
        }else{
            return '没有操作权限';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin){
            $userC = new \App\User();
            $userC->deleteUser($id);
            $user= $userC->getAllUser();
            return view('userList', compact('user'));
        }else{
            return '您没有权限';
        }
    }
}
