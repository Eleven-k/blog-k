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
            'only' => ['create']
        ]);
    }

    // 用户登录静态视图
    public function login()
    {
        return view('sessions.login');
    }


    // 用户登录
    public function store(Request $request, User $user)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
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
