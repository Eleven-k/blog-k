<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['create','store']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    // 用户个人页面
    public function show(User $user)
    {
        $articles = $user->articles()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('users.show', compact('user', 'articles'));
    }

    // 用户编辑页面
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // 用户更新方法
    public function update(User $user, Request $request,ImageUploadHandler $uploader)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'introduction' => 'nullable',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        $data['introduction'] = $request->introduction;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $user);
    }
}
