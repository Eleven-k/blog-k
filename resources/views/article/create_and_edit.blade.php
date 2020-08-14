@extends('layouts.default')
@section('title','十一的部落格')
@section('content')
<div class="col-sm-8">

    <div class="content">

        <div class="bd-example" style="border: 0;">
            <div class="card ">
                <div class="card-header">
                    <h1>
                        @if($article->id)
                        编辑文章
                        @else
                        新建文章
                        @endif
                    </h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST" accept-charset="UTF-8">

                        @include('shared._errors')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" value="" placeholder="请填写标题" value="{{ old('title') }}" required />
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="category_id" required>
                                <option value="" hidden disabled selected>请选择分类</option>
                                @foreach ($categories as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <textarea name="content" class="form-control" id="editor" rows="6" placeholder="请填入至少三个字符的内容。" autofocus>{{ old('content') }}</textarea>
                        </div>
                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@stop

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop
@section('scripts')
<script type="text/javascript" src="{{ asset('jquery.min.jss') }}"></script>
<script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
    <script>
        toolbar = [ 'title', 'bold', 'italic', 'underline', 'strikethrough',
            'color', 'fontScale', 'ol', 'ul', 'blockquote', 'code', 'table',
            'link', 'image', 'hr',  'indent', 'outdent','alignment' ];
        var editor = new Simditor({
            textarea : $('#editor'),
            toolbar : toolbar,  //工具栏
            pasteImage: true,
            upload: {
          url: '{{ route('articles.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        });
    </script>
@stop