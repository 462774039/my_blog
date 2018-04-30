<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>博客系统</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <script type="text/javascript">
        function submit(id) {
            document.getElementById("deleteForm").action = "/blog/" + id;
            document.getElementById("deleteForm").submit();
        }
    </script>

</head>
<body>
@include('head')


<a href="/">全部</a>
@foreach($data['class'] as $class)
    <a href="/?class_id={{$class->id}}">{{$class->name}}</a>
@endforeach

<ui>
@foreach($data['blog'] as $blog)
    <li>
        <a href="/blog/{{$blog->id}}">{{$blog->title}}</a>
        @if(isset(Auth::user()->isAdmin) and Auth::user()->isAdmin)
            <a href="/blog/{{$blog->id}}/edit"><button>编辑</button></a>
            <button onclick="submit({{$blog->id}})">删除</button></a>
        @endif
    </li>
@endforeach
</ui>

<form action="" method="post" id="deleteForm">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>



</body>
</html>
