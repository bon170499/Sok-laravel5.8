<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class imgController extends Controller
{
    public function getList()
    {
        $data = [
            'list' => DB::table('clothes_img')->orderBy('img_id', 'desc')->paginate(5),
        ];
        return view('backend.list_img', $data);
    }
    public function add()
    {
        $data = [
            'img' => DB::table('clothes_img')->get(),
            'product' => DB::table('clothes_product')->get()
        ];
        return view('backend.change_img', $data);
    }
    public function doAdd(Request $request)
    {
        $product = isset($request->product) ? $request->product : '';
        $fileName = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            foreach ($file as $item) {
                $fileName = $item->getClientOriginalName('img');
                $item->move('img/', $fileName);
                DB::table('clothes_img')->insert([
                    'img_img' => $fileName,
                    'img_pro_id' => $product
                ]);
            }
        }
        return redirect('admin/img');
    }
    public function edit($id)
    {
        $data = [
            'record' => DB::table('clothes_img')->where('img_id', $id)->first(),
            'product' => DB::table('clothes_product')->get()
        ];
        return view('backend.change_img', $data);
    }
    public function doEdit(Request $request, $id)
    {
        $product = isset($request->product) ? $request->product : '';
        if ($request->hasFile('img')) {
            $oldImg = DB::table('clothes_img')->where('img_id', $id)->get();
            foreach($oldImg as $item){
                if ($item->img_img != '' && file_exists(public_path('img/' . $item->img_img))) {
                    unlink(public_path('img/' . $item->img_img));
                }
            }
            $file = $request->file('img');
            foreach ($file as $item) {
                $fileName = $item->getClientOriginalName('img');
                $item->move('img/', $fileName);
                DB::table('clothes_img')->insert([
                    'img_img' => $fileName,
                    'img_pro_id' => $product
                ]);
            }
        }
        return redirect('admin/img');
    }
    public function delete($id)
    {
        DB::table('clothes_img')->where('img_id', $id)->delete();
        return redirect('admin/img');
    }
}
