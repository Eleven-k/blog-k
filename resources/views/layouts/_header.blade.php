<div class="col-sm-4">
    <div class="sidebar">
        <div class="site-header">
            <div class="sidebar-title">
                <h1><a href="#">十一的部落格</a></h1>
                <p>No game no life</p>
            </div>
        </div>
        <div class="secondary">
            <div class="main-list">
                @if(Auth::check())
                <ul>
                    <li><a href="{{ route('index') }}">首页</a></li>
                    <li><a href="{{ route('users.show',Auth::id())}}">个人中心</a></li>
                    <li><a href="{{ route('users.edit', Auth::id()) }}">编辑资料</a></li>
                    <li><a href="{{ route('articles.create') }}">发布文章</a></li>

                    <!-- <a href="{{ route('articles.create') }}" class="btn btn-success btn-block" aria-label="Left Align">
                        <i class="fas fa-pencil-alt mr-2"></i> 新建帖子
                    </a> -->

                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                    </form>
                </ul>
                @else
                <ul>
                    <li><a href="{{ route('index') }}">首页</a></li>
                    <li><a href="">技术</a></li>
                    <li><a href="">测评</a></li>
                    <li><a href="">链接</a></li>
                    <li><a href="">实验室</a></li>
                    <li><a href="">关于</a></li>
                </ul>
                @endif

            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="搜索..." aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
</div>