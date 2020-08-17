@extends('layouts.default')
@section('title','十一的部落格')
@section('content')
<div class="col-sm-8">



    <div class="content">
        <div class="main">
            <div class="main-header">
                <h2 class="entry-title">{{ $article->title }}</h2>
            </div>
            <div class="main-content">
                <p>{!! $article->content !!}</p>
            </div>
        </div>

    </div>



    <div class="footer">
        <div class="footer-main">
            <a href="#">十一的个人博客</a>
        </div>
    </div>
</div>
@stop