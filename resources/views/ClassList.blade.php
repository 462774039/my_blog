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

    <script type="text/javascript">
        function submit(id) {
            document.getElementById("deleteForm").action = "/classify/" + id;
            document.getElementById("deleteForm").submit();
        }
    </script>

</head>
<body>
@include('head')
<form action="/classify" method="post">
    {{ csrf_field() }}
    添加分类：<input name="name" type="text">
    <button type="submit">添加</button>
</form>

<ui>
    @foreach($class as $data)
        <li>
            <a href="/?class_id={{$data->id}}">{{$data->name}}</a>
            @if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin)
                <a href="/classify/{{$data->id}}/edit">编辑</a>|
                <button onclick="submit({{$data->id}})">删除</button>
            @endif
        </li>
    @endforeach
</ui>

<form action="/" method="post" id="deleteForm">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
</body>
</html>
