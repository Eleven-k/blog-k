<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Auth;
use App\Handlers\ImageUploadHandler;

class ArticlesController extends Controller
{
    
  // 主页文章显示
    public function index()
    {
        $feed_items = Article::where([])->orderBy('created_at', 'desc')->get();
        
        return view('article.index', compact('feed_items',[Auth::user()]));
    }

    // 文章详情显示
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    // 创建文章页面
    public function create(Article $article)
    {
        $categories = Category::all();
        return view('article.create', compact('article', 'categories'));
    }


    // 创建文章方法
    public function store(Request $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('show', $article->id)->with('success', '文章创建成功！');
    }

    // 发布文章中的图片上传
    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($file, 'articles', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }

    // 编辑文章页面
    // public function edit(Article $article)
    // {
    //     return view('admin._articleEdit', compact('article'));
    // }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', compact('article','categories'));
    }

    // 编辑文章方法
    public function update(Article $article, Request $request)
    {
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        session()->flash('success', '文章更新成功！');
        return redirect()->route('show', $article->id);
    }

    // 删除文章
    public function destroy(Article $article)
    {
        // $this->authorize('destroy', $article);
        Article::destroy($article->id);
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }

}
