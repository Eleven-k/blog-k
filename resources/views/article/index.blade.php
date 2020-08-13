@extends('layouts.default')
@section('title','十一的部落格')
@section('content')
<div class="col-sm-8">

  @if (isset($feed_items))
  <ul class="list-unstyled">
    @foreach ($feed_items as $article)
    @include('article._article', ['user' => $article->user_id])
    @endforeach
  </ul>
  @else
  <p>没有数据！</p>
  @endif


  <div class="footer">
    <div class="footer-main">
      <a href="#">自豪地采用WordPress</a>
      <span><a href="{{ route('login') }}">.</a></span>
      <span><a href="{{ route('users.create') }}"></a></span>
      <!-- <span><a href="{{ route('login') }}">登录</a></span>
      <span><a href="{{ route('users.create') }}">注册</a></span> -->
    </div>
  </div>
</div>
@stop