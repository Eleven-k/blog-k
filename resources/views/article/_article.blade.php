<div class="content">
    <div class="main">
        <div class="main-header">
            <h2 class="entry-title"><a href="{{route('show',$article->id)}}" rel="bookmark">{{ $article->title }}</a></h2>
        </div>
        <div class="main-content">
            <p>{!! $article->content !!}</p>
        </div>
    </div>
    <div class="main-footer">
        <span class="foot-left"><a href="#"><span class="iconfont icon-rili1"></span>{{ $article->created_at->diffForHumans() }}</a></span>
        <span class="foot-right"><a href="#"><span class="iconfont icon-wenjianjia"></span>{{ $user->name }}</a></span>
    </div>
</div>