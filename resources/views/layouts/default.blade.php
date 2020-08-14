<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Weibo App')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/front.css') }}">
    <link rel="stylesheet" href="/css/iconfont.css">
    @yield('styles')
</head>

<body>

   
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
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>