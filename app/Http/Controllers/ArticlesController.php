<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Auth;

class ArticlesController extends Controller
{
    

    public function index()
    {
        
        $feed_items = Article::all();
        
        return view('article.index', compact('feed_items'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
}
