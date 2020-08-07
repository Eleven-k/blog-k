<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Auth;
use App\Models\User;
use App\Handlers\ImageUploadHandler;

class AdminArticlesController extends Controller
{
    // 获取文章列表
    public function index(Request $request, Article $article)
    {
        $articles = article::where([])->orderBy('created_at', 'desc')->get();
        // $articles = $article;
        // dd($article);
        return view('admin.index', compact('articles'));
    }

    // 发布文章
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|min:10'
        ]);
        // dd($request->content);
        Auth::user()->articles()->create([
            'title' => $request['title'],
            'content' => $request['content']
        ]);

        session()->flash('success', '发布成功！');
        $fallback = route('articles.index', Auth::user());
        return redirect($fallback);
    }

    // 删除文章
    public function destroy(Article $article)
    {
        // $this->authorize('destroy', $article);
        Article::destroy($article->id);
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }

    // 发布文章跳转页面
    public function create()
    {
        return view('admin.create');
    }

    // 编辑文章页面
    public function edit(Article $article)
    {
        return view('admin._articleEdit', compact('article'));
    }

    // 编辑文章方法
    public function update(Article $article, Request $request)
    {
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        session()->flash('success', '文章更新成功！');
        return redirect()->route('articles.index');
    }

    // 上传图片
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
            $result = $uploader->save($file, 'topics', Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
