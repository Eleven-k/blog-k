<?php
namespace App\Observers;
use App\Models\Article;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored
class TopicObserver
{
    public function saving(Article $article)
    {
        $article->body = clean($article->content, 'user_topic_body');
        $article->excerpt = make_excerpt($article->content);
    }
}