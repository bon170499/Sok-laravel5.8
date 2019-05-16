<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Hash;
class userController extends Controller
{
    public function getList()
    {
        $data = [
            'list' => User::orderBy('id', 'desc')->paginate(5),
        ];
        return view('backend.list_user', $data);
    }
    public function add()
    {
        return view('backend.change_user');
    }
    public function doAdd(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $count = User::where('email', $user->email)->count();
        if($count == 0){
            $user->save();
            return redirect('admin/user');
        }else
            return redirect('admin/user/add?err=user_exist');
    }
    public function edit($id)
    {
        $data = [
            'record' => User::find($id)
        ];
        return view('backend.change_user', $data);
    }
    public function doEdit(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('admin/user')->with('thongbao', 'Bạn đã sửa thành công');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('admin/user')->with('thongbao', 'Bạn đã xoá thành công');
    }
}
