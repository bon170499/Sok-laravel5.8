<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
class orderDetailController extends Controller
{
    public function getList(Request $request, $id)
    {
        $cus = DB::table('clothes_order_detail')->where('detail_or_id', $id)->first();
        $data = [
            'list' => DB::table('clothes_order_detail')->where('detail_or_id', $id)->get(),
            'customer' => DB::table('clothes_customer')->where('customer_id', $cus->detail_cus_id)->first(),
            'order' => DB::table('clothes_order')->where('order_id', $id)->first()
        ];
        return view('backend.list_order_detail', $data);
    }
    public function update($id)
    {
        $order = Order::find($id);
        $order->order_status = 1;
        $order->save();
        $cus = DB::table('clothes_order_detail')->where('detail_or_id', $id)->first();
        $data = [
            'list' => DB::table('clothes_order_detail')->where('detail_or_id', $id)->get(),
            'customer' => DB::table('clothes_customer')->where('customer_id', $cus->detail_cus_id)->first(),
            'order' => DB::table('clothes_order')->where('order_id', $id)->first()
        ];
        return view('backend.list_order_detail', $data);
    }
}
