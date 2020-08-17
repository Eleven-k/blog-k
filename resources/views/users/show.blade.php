@extends('layouts.default')
@section('title','十一的部落格')
@section('content')
<div class="col-sm-8">

    <div class="content">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="card ">
                    <div class="card-body">
                        <h1 class="mb-0" style="font-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
                    </div>
                </div>
                <hr>
                {{-- 用户发布的内容 --}}
                <div class="card ">
                    <div class="card-body">
                        @if (count($articles))

                        <ul class="list-group mt-4 border-0">
                            @foreach ($articles as $article)
                            <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 @if($loop->first) border-top-0 @endif">
                                <a href="{{ route('show', $article->id) }}">
                                    {{ $article->title }}
                                </a>
                                <span>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('您确定要删除本条微博吗？');">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{route('articles.edit',$article->id)}}" style="font-size: 14px;top: 11px;/* padding-top: 41px; */position: absolute;right: 44px;">编辑</a>
                                    <span>
                                        <button type="submit" class="btn btn-link" style="color: red;font-size:13px;position: absolute;top: 5px;right: -5px;">删除</button>
                                    </span>
                                    <!-- <button type="submit" class="btn btn-sm btn-danger">删除</button> -->
                                </form>
                                </span>
                                <span class="meta float-right text-secondary">
                                    {{ $article->created_at->diffForHumans() }}
                                </span>
                            </li>
                            @endforeach
                        </ul>

                        @else
                        <div class="empty-block">暂无数据 ~_~ </div>
                        @endif

                        {{-- 分页 --}}
                        <div class="mt-4 pt-1">
                            {!! $articles->render() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
                <div class="card ">
                    <img class="card-img-top" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                    <div class="card-body">
                        <h5><strong>个人简介</strong></h5>
                        <p>{{ $user->introduction }}</p>
                        <hr>
                        <h5><strong>注册于</strong></h5>
                        <p>{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop