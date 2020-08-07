<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Weibo App')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/front.css') }}">
    <link rel="stylesheet" href="/css/iconfont.css">
</head>

<body>
    @if(Auth::check())
    <div class="initiate">
        <div class="row ment">
            <div class="col-1 left"><a href="{{route('articles.index')}}">逝水流年轻染尘</a></div>
            <div class="col-10"></div>
            <div class="col-1 right"><a href="#"> {{ Auth::user()->name }}</a><a href=""><img src="/images/timg.jpg" alt="portrait"></a>
            </div>
        </div>


        <div class="layout">
            <div class="row">
                <div class="wrapper">

                    @include('layouts._header')
                    @include('shared._messages')
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    @else
    <div class="initiate">
        <div class="layout">
            <div class="row">
                <div class="wrapper">

                    @include('layouts._header')
                    @include('shared._messages')
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
    @endif

</body>

</html>