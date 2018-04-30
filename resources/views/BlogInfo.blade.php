<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$data['blog']->title}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <script type="text/javascript">
        function deleteBlog() {
            document.getElementById("deleteBlog").action = "/blog/" + "{{$data['blog']->id}}";
            document.getElementById("deleteBlog").submit();
        }

        function deleteDiscuss($id) {
            document.getElementById("deleteDiscuss").action = "/discuss/" + $id;
            document.getElementById("deleteDiscuss").submit();
        }
    </script>

</head>
<body>
@include('head')

<h2 align="center">{{$data['blog']->title}}</h2>
<p align="right">
作者：{{$data['blog']->user['name']}}</br>
更新时间：{{$data['blog']->updated_at}}</br>
分类:<a href="/?class_id={{$data['blog']->class_id}}">{{$data['blog']->classify['name']}}</a></br>
@if((isset(Auth::user()->isAdmin) and Auth::user()->isAdmin) or $data['blog']->user_id == Auth::id())
    <a href="/blog/{{$data['blog']->id}}/edit"><button>编辑文章</button></a>
    <button onclick="deleteBlog()">删除文章</button>
@endif
</p>
正文：
<p>{{$data['blog']->body}}</p>

评论区：
<ui>
@foreach($data['discuss'] as $discuss)
    <li>
        {{$discuss->body}}
        @if((isset(Auth::user()->isAdmin) and Auth::user()->isAdmin) or $data['blog']->user_id == Auth::id())
            <button onclick="deleteDiscuss({{$discuss->id}})">删除</button>
        @endif
        </br>
        &emsp;评论用户：<a href="/user/{{$discuss->user['id']}}">{{$discuss->user['name']}}</a>
        时间：{{$discuss->created_at}}
        </br>
    </li>
@endforeach
</ui></br>

<form action="/discuss" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="blog_id" value="{{$data['blog']->id}}">
    发表评论：</br>
    <textarea name="body"></textarea>
    <button type="submit">发表</button>
</form>


<form action="" method="post" id="deleteBlog">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>

<form action="" method="post" id="deleteDiscuss" style="display:none">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <input name="blog_id" value="{{$data['blog']->id}}">
</form>
</body>
</html>
