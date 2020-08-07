@extends('admin.general')
@section('title','admin')
@section('content')
<div class="content">

  <div class="bd-example" style="border: 0;">
    <div class="card ">
      <div class="card-header">
        <h1>
          新建文章
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
            'link', 'image', 'hr',  'indent', 'outdent','alignment' ,'html'];
        var editor = new Simditor({
            textarea : $('#editor'),
            placeholder : '这里输入内容...',
            pasteImage: true,
            toolbarFloat:true,
            toolbar : toolbar,  //工具栏
            defaultImage : 'simditor-1.0.5/images/image.png', //编辑器插入图片时使用的默认图片
            upload : {
                url : 'ImgUpload.action', //文件上传的接口地址
                params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
                fileKey: 'fileDataFileName', //服务器端获取文件数据的参数名
                connectionCount: 3,
                leaveConfirm: '正在上传文件'
            }
        });
    </script>
@stop