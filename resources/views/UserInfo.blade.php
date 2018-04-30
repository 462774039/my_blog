<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>分类管理</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

</head>
<body>
@include('head')
Email：{{$user->email}}
@if($user->id == Auth::id())
    <a href="/changePassword?id={{$user->id}}"><button>修改密码</button></a>
@endif
</br>

@if($user->id == Auth::id())
    <form action="/changeSelfInfoSubmit" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{$user->id}}">
        QQ：<input type="text" name="qq" value="{{$user->qq}}"></br></br>
        名字：<input type="text" name="name" value="{{$user->name}}"></br></br>
        交友宣言：<input type="text" name="make_friends" value="{{$user->make_friends}}"></br></br>
        个人简介：</br><textarea name="self_info">{{$user->self_info}}</textarea><br>
        <button type="submit">保存</button>
    </form>
@else
    QQ：{{$user->qq}}</br>
    名字：{{$user->name}}</br>
    交友宣言：{{$user->make_friends}}</br>
    个人简介：{{$user->self_info}}<br>
@endif



</body>
</html>
