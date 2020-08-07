@extends('admin.general')
@section('title','admin')
@section('content')
<div class="content">

    <div class="bd-example" style="border: 0;">
        <h1>个人页面</h1>
        <form method="POST" action="{{ route('admin.update', $admin=Auth::user()->id)}}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <div class="form-update">
                <div class="form-before">
                    <span>邮箱</span></div>
                <input type="email" name="email" class="3333" disabled>
            </div>
            <div class="form-update">
                <div class="form-before">
                    <span>用户名</span></div>
                <input type="test" name="name" class="3333"  placeholder="{{ Auth::user()->name }}">
            </div>
            <div class="form-update">
                <div class="form-before">
                    <span>密码</span></div>
                <input type="password" name="password" class="3333">
            </div>
            <div class="form-update">
                <div class="form-before">
                    <span>确认密码</span></div>
                <input type="password" name="password_confirmation" class="3333">
            </div>
            <div class="form-but"><button type="submit" class="btn btn-primary">更新</button></div>

        </form>
    </div>
</div>
@stop