<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Weibo App')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/general.css') }}">
    <link rel="stylesheet" href="/css/iconfont.css">
    @yield('styles')
</head>

<body>
    <div class="container">

        <div class="row ment">
            <div class="col-1 left"><a href="{{ route('articles.index') }}">逝水流年轻染尘</a></div>
            <div class="col-10"></div>
            <div class="col-1 right"><a href="{{ route('admin.show',$admin=Auth::user()->id) }}"> {{ Auth::user()->name }}</a><a href=""><img src="/images/timg.jpg" alt="portrait"></a>
        </div>
        </div>

        <div class="row contengs">
            <div class="col-1">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="搜索...">
                </div>
                <ul class="rev">
                    <li><a href="{{route('index')}}">首页</a></li>
                    <li><a href="#">如何开始</a></li>
                    <li><a href="{{ route('articles.index',Auth::user()->id) }}">文章列表</a></li>
                    <li><a href="{{route('articles.create')}}">发布文章</a></li>
                    <li><a href="#">用户列表</a></li>
                    <li><a href="#">设置</a></li>
                    
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                        </form>
                    
                </ul>
            </div>
            @yield('content')
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>