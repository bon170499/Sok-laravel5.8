<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use DB;
class albumController extends Controller
{
    public function getList()
    {
        $data = [
            'list' => Album::orderBy('album_id', 'desc')->paginate(5),
        ];
        return view('backend.list_album', $data);
    }
    public function add()
    {
        $data = [
            'album' => Album::all()
        ];
        return view('backend.change_album', $data);
    }
    public function doAdd(Request $request)
    {
        $album = new Album;
        $album->album_name = $request->name;
        $fileName = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName('img');
            $file->move('img/', $fileName);
            $album->album_img = $fileName;
        }
        $album->save();
        return redirect('admin/album')->with('thongbao', 'Bạn đã thêm thành công');
    }
    public function edit($id)
    {
        $data = [
            'record' => Album::find($id),
        ];
        return view('backend.change_album', $data);
    }
    public function doEdit(Request $request, $id)
    {
        $album = Album::find($id);
        $album->album_name = $request->name;
        if ($request->hasFile('img')) {
            $oldImg = DB::table('clothes_album')->where('album_id', $id)->first();
            if ($oldImg->album_img != '' && file_exists(public_path('img/' . $oldImg->album_img))) {
                unlink(public_path('img/' . $oldImg->album_img));
            }
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName('img');
            $file->move('img/', $fileName);
            $album->album_img = $fileName;
        }
        $album->save();
        return redirect('admin/album')->with('thongbao', 'Bạn đã sửa thành công');
    }
    public function delete($id)
    {
        Album::find($id)->delete();
        return redirect('admin/album')->with('thongbao', 'Bạn đã xoá thành công');
    }
}
