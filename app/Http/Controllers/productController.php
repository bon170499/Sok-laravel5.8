<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Category;
use App\Album;

class productController extends Controller
{
    public function getList()
    {
        $data = [
            'list' => Product::orderBy('product_id', 'desc')->paginate(5),
        ];
        return view('backend.list_product', $data);
    }
    public function add()
    {
        $data = [
            'category' => Category::all(),
            'album' => Album::all(),
        ];
        return view('backend.change_product', $data);
    }
    public function doAdd(Request $request)
    {
        $product = new Product;
        $product->product_name = isset($request->name) ? $request->name : '';
        $product->product_name = strtoupper($product->product_name);
        $product->product_price = isset($request->price) ? $request->price : 0;
        $product->product_hot = isset($request->hot) ? 1 : 0;
        $product->product_sale = isset($request->sale) ? 1 : 0;
        $product->product_upto = isset($request->upto) ? $request->upto : 0;
        $product->product_fk_id = isset($request->category) ? $request->category : '';
        $product->product_ab_id = isset($request->album) ? $request->album : '';
        $product->product_desc = isset($request->desc) ? $request->desc : '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName('img');
            $file->move('img/', $fileName);
        }
        $product->product_img = $fileName;
        $product->save();
        return redirect('admin/product')->with('thongbao', 'Bạn đã thêm thành công');
    }
    public function edit($id)
    {
        $data = [
            'record' => Product::find($id),
            'category' => Category::all(),
            'album' => Album::all()
        ];
        return view('backend.change_product', $data);
    }
    public function doEdit(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name = isset($request->name) ? $request->name : '';
        $product->product_name = strtoupper($product->product_name);
        $product->product_price = isset($request->price) ? $request->price : 0;
        $product->product_hot = isset($request->hot) ? 1 : 0;
        $product->product_sale = isset($request->sale) ? 1 : 0;
        $product->product_upto = isset($request->upto) ? $request->upto : 0;
        $product->product_fk_id = isset($request->category) ? $request->category : '';
        $product->product_ab_id = isset($request->album) ? $request->album : '';
        $product->product_desc = isset($request->desc) ? $request->desc : '';
        if ($request->hasFile('img')) {
            $oldImg = DB::table('clothes_product')->where('product_id', $id)->first();
            if ($oldImg->product_img != '' && file_exists(public_path('img/' . $oldImg->product_img))) {
                unlink(public_path('img/' . $oldImg->product_img));
            }
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName('img');
            $file->move('img/', $fileName);
            $product->product_img = $fileName;
        }
        $product->save();
        return redirect('admin/product')->with('thongbao', 'Bạn đã sửa thành công');
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect('admin/product')->with('thongbao', 'Bạn đã xoá thành công');
    }
}
