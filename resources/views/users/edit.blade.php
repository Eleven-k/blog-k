@extends('layouts.default')
@section('title','十一的部落格')
@section('content')
<div class="col-sm-8">

    <div class="content">


        <div class="container">
            <div class="col-md-8 offset-md-2">

                <div class="card">
                    <div class="card-header">
                        <h4>
                            <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
                        </h4>
                    </div>
                    @include('shared._errors')
                    <div class="card-body">

                        <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name-field">用户名</label>
                                <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
                            </div>
                            <div class="form-group">
                                <label for="introduction-field">个人简介</label>
                                <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label htmlFor="password">密码：</label>
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                            </div>
                            <div class="form-group">
                                <label htmlFor="password_confirmation">确认密码：</label>
                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" />
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="avatar-label">用户头像</label>
                                <input type="file" name="avatar" class="form-control-file">

                                @if($user->avatar)
                                <br>
                                <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                                @endif
                            </div>
                            <div class="well well-sm">
                                <button type="submit" class="btn btn-primary">保存</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop