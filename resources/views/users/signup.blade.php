<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/front.css') }}">
    <title>注册</title>
</head>
<body style="background-image: url(images/background.svg);">
<div class="signup">
            <div class="signup-form">

            <a href=""><img src="/images/head-logo.png" alt="logo"></a>

            @include('shared._errors')
            
            <form method="POST" action="{{ route('users.store') }}">

            {{ csrf_field() }}

                <div class="form-group">
                    <input type="test" name="name" class="form-control" placeholder="名称：" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="邮箱：" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码：" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="确认密码：" value="{{ old('password_confirmation') }}">
                </div>
                <button type="submit" class="btn btn-primary">注册</button>
            </form>

            </div>
    </div>
</body>
</html>
