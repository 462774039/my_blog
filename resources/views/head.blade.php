<div align="right">
    @if (Auth::check())
        欢迎回来，{{Auth::user()->name}}|
        <a href="{{ url('/') }}">首页</a>|
        @if(Auth::user()->isAdmin)
            <a href="/blog/create">发表文章</a>|
            <a href="/classify">分类管理</a>|
            <a href="/user">用户管理</a>|
        @endif
        <a href="/user/{{Auth::id()}}">个人中心</a>|
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">注销</a>
    @else
        <a href="{{ route('login') }}">登陆</a>
        <a href="{{ route('register') }}">注册</a>
    @endif

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
     </form>
</div>
