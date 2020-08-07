<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/front.css') }}">
    <title>登录</title>
</head>
<body style="background-image: url(images/background.svg);">
<div class="signup">
            <div class="signup-form">

            <a href=""><img src="images/head-logo.png" alt="logo"></a>

            @include('shared._errors')

            <form method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}

                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="邮箱：" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码：" value="{{ old('password') }}">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">记住我</label>
                </div>
                <button type="submit" class="btn btn-primary">登录</button>
            </form>

            </div>
    </div>
</body>
</html>
