<div class="content">
    <div class="main">
        <div class="main-header">
            <h2 class="entry-title"><a href="{{route('show',$article->id)}}" rel="bookmark">{{ $article->title }}</a></h2>
        </div>
    </div>
    <div class="main-footer">
        <span class="foot-left"><a href="#"><span class="iconfont icon-rili1"></span>{{ $article->created_at->diffForHumans() }}</a></span>
        <span class="foot-right"><a href="#"><span class="iconfont icon-wenjianjia"></span>{{ $article->user_id }}</a></span>
    </div>
</div>