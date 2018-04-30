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
            document.getElementById("deleteForm").action = "/user/" + id;
            document.getElementById("deleteForm").submit();
        }
    </script>

</head>
<body>
@include('head')


用户列表：
<ui>
    @foreach($user as $data)
        <li>
            <a href="/user/{{$data->id}}">{{$data->name}}</a>
            @if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin)
                <a href="/user/{{$data->id}}/edit"><button>编辑</button></a>
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
