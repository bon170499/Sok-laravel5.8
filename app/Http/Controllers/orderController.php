<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
class orderController extends Controller
{
    public function getList()
    {
        $data = [
            'list' => Order::orderBy('order_id', 'desc')->paginate(5),
            'customer' => Customer::all()
        ];
        return view('backend.list_order', $data);
    }
    public function delete($id)
    {
        Order::find($id)->delete();
        return redirect('admin/order');
    }
}
