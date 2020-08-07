<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['login','store']
        ]);

        $this->middleware('guest', [
            'only' => ['login']
        ]);
    }

    // 用户登录静态视图
    public function login()
    {
        return view('sessions.login');
    }

    public function admin(User $user)
    {
        $articles = $user->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.index', compact('user', 'articles'));
    }

    // 用户登录
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('admin', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    // 用户退出
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('/');
    }
}
