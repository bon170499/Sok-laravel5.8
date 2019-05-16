<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Album;

class categoryController extends Controller
{
    public function getList()
    {
        $data = [
            'list' => Category::orderBy('category_id', 'desc')->paginate(5),
        ];
        return view('backend.list_category', $data);
    }
    public function add()
    {
        $data = [
            'album' => Album::all()
        ];
        return view('backend.change_category', $data);
    }
    public function doAdd(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->name;
        $category->category_sex = $request->sex;
        $category->category_ab_id = $request->album;
        $category->save();
        return redirect('admin/category')->with('thongbao', 'Bạn đã thêm thành công');
    }
    public function edit($id)
    {
        $data = [
            'record' => Category::find($id),
            'album' => Album::all()
        ];
        return view('backend.change_category', $data);
    }
    public function doEdit(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->name;
        $category->category_sex = $request->sex;
        $category->category_ab_id = $request->album;
        $category->save();
        return redirect('admin/category')->with('thongbao', 'Bạn đã sửa thành công');
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect('admin/category')->with('thongbao', 'Bạn đã xoá thành công');
    }
}
