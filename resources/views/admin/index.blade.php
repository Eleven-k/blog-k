@extends('admin.general')
@section('title','admin')
@section('content')
<div class="content">

    <div class="bd-example">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">标题</th>
                    <th scope="col">发布人</th>
                    <th scope="col">发布时间</th>
                    <th scope="col" class="delete">管理</th>
                </tr>
            </thead>
            <tbody>

                @if ($articles->count() > 0)
                    @foreach ($articles as $article)
                    @include('admin._article',['articles' => $articles])
                    @endforeach
                @else
                <p>没有数据！</p>
                @endif
                
            </tbody>
           
        </table>
    </div>
</div>
@stop