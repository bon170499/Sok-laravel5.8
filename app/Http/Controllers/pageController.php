<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Cart;
use Hash;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\User;
class pageController extends Controller
{
    function ham_loc_dau($st)
    {
        $codau = array(
            "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă",
            "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
            "ì", "í", "ị", "ỉ", "ĩ",
            "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
            "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
            "ỳ", "ý", "ỵ", "ỷ", "ỹ",
            "đ",
            "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
            "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
            "Ì", "Í", "Ị", "Ỉ", "Ĩ",
            "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
            "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
            "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
            "Đ", " "
        );

        $khongdau = array(
            "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
            "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
            "i", "i", "i", "i", "i",
            "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
            "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
            "y", "y", "y", "y", "y",
            "d",
            "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
            "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
            "I", "I", "I", "I", "I",
            "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
            "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
            "Y", "Y", "Y", "Y", "Y",
            "D", "_"
        );
        return str_replace($codau, $khongdau, $st);
    }
    public function trangchu()
    {
        $data = [
            'hot' => DB::table('clothes_product')->where('product_hot', '1')->limit(4)->orderBy('product_id', 'asc')->get(),
            'sale' => DB::table('clothes_product')->where('product_sale', '1')->limit(4)->orderBy('product_upto', 'desc')->get(),
            'category' => DB::table('clothes_category')->orderBy('category_name', 'asc')->get(),
            'album' => DB::table('clothes_album')->get(),
        ];
        return view('pages.home', $data);
    }
    public function sanpham($id)
    {
        $data = [
            'category' => DB::table('clothes_category')->orderBy('category_name', 'asc')->get(),
            'album' => DB::table('clothes_album')->get(),
            'product' => DB::table('clothes_product')->where('product_fk_id', $id)->orderBy('product_id', 'desc')->paginate(10),
            'bread' => DB::table('clothes_category')->where('category_id', $id)->first(),
        ];
        return view('pages.product', $data);
    }
    public function thongtin($id)
    {
        $data = [
            'category' => DB::table('clothes_category')->orderBy('category_name', 'asc')->get(),
            'info' => DB::table('clothes_product')->where('product_id', $id)->first(),
            'img' => DB::table('clothes_img')->where('img_pro_id', $id)->get(),
            'product' => DB::table('clothes_product')->get(),
        ];
        return view('pages.info', $data);
    }
    public function muahang($id)
    {
        $data = DB::table('clothes_product')->where('product_id', $id)->first();
        $price = $data->product_price;
        $sale = $data->product_sale;
        $upto = $data->product_upto;
        $id = $data->product_id;
        if ($sale == 1)
            $price = $price - $upto / 100 * $price;
        Cart::add([
            'id' => $id,
            'name' => $data->product_name,
            'price' => $price,
            'weight' => '',
            'qty' => 1,
            'options' => ['img' => $data->product_img, 'sale' => $sale, 'upto' => $upto, 'old' => $data->product_price, 'id' => $id]
        ]);
        $content = Cart::content();
        return redirect()->route('giohang');
    }
    public function giohang()
    {
        $content = Cart::content();
        $total = Cart::subtotal(0, '.', '.');
        $count = Cart::count();
        return view('pages.cart', compact('content', 'total', 'count'));
    }
    public function xoaSanPham($id)
    {
        Cart::remove($id);
        return redirect()->route('giohang');
    }
    public function xoaSanPham2($id)
    {
        Cart::remove($id);
        return redirect('home-sok');
    }
    public function xoaToanBo()
    {
        Cart::destroy();
        return redirect()->route('giohang');
    }
    public function capnhat(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            $qty = $request->get('qty');
            $output = "giatien";
            Cart::update($id, $qty);
            $fee = Cart::subtotal(0, '.', '.');
            $count = Cart::count();
            $result = [
                'item' => $output,
                'fee' => $fee,
                'count' => $count
            ];
            echo json_encode($result);
        }
    }
    public function updateCart(Request $request)
    {
        if($request->ajax()) {
            $id = $request->get('id');
            $data = DB::table('clothes_product')->where('product_id', $id)->first();
            $price = $data->product_price;
            $sale = $data->product_sale;
            $upto = $data->product_upto;
            $id = $data->product_id;
            if ($sale == 1)
                $price = $price - $upto / 100 * $price;
            Cart::add([
                'id' => $id,
                'name' => $data->product_name,
                'price' => $price,
                'weight' => '',
                'qty' => 1,
                'options' => ['img' => $data->product_img, 'sale' => $sale, 'upto' => $upto, 'old' => $data->product_price, 'id' => $id]
            ]);
            $content = Cart::content();
            $output = '';
            foreach($content as $item){
                $data = [
                    'rowId' => $item->rowId,
                    'name' => $item->name,
                    'qty' => $item->qty,
                    'img' => $item->options->img,
                    'id' => $item->id
                ];
                $output .= '<div class="item-cart">'
                            .'<img src="http://bonkiukiu.herokuapp.com/img/' . $data['img'] .'" alt="" class="item-cart__img">'
                            .'<div class="item-cart__link">'
                                .'<a href="http://bonkiukiu.herokuapp.com/home-sok/thong-tin-san-pham/'. $data['id'] .'"> ' . $data['name'] .'</a>'
                                .'<span>x' . $data['qty'] . '</span>'
                                .'<a href="http://bonkiukiu.herokuapp.com/home-sok/xoa-san-pham2/' . $data['rowId'] .'" style="display: block"><i class="fas fa-trash-alt"></i></a>'
                            .'</div>'
                        .'</div>';
            }
            $result = [
                'output' => $output,
                'total' => Cart::subtotal(0, '.', '.'),
                'count' => Cart::count(),
                'item' => $data
            ];
            echo json_encode($result);
        }
    }
    public function searchName(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('clothes_product')->where('product_name', 'like', '%' . $query . '%')->get();
            } else {
                $data = '';
            }
            $total = $data->Count();
            if ($total > 0) {
                foreach ($data as $item) {
                    $output .= '<a class="item-search col-md-3 col-sm-12 col-12 align-items-center" ' . 'href="http://bonkiukiu.herokuapp.com/home-sok/thong-tin-san-pham/' . $item->product_id . '" style="display: flex">'
                    . '<img src="img/' . $item->product_img . '" style="width: 50px; margin-right: 5px;">'
                        . $item->product_name
                     . "</a>";
                }
            } else {
                $output = 'Không tìm thấy sản phẩm bạn yêu cầu';
            }
            $data = [
                'item' => $output,
            ];
            echo json_encode($data);
        }
    }
    public function dangnhap(Request $request)
    {
        if (Auth::attempt(['email' => $request->emailSI, 'password' => $request->passSI]))
            return redirect('home-sok');
        else
            return redirect('home-sok')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng');
    }
    public function dangky(Request $request)
    {
        $name = $request->upName;
        $email = $request->upMail;
        $pass = $request->upPass;
        $pass = Hash::make($pass);
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $pass,
        ]);
        return redirect('home-sok');
    }
    public function getLogin()
    {
        return redirect('home-sok');
    }
    public function getCheckOut()
    {
        $data = [
            'hot' => DB::table('clothes_product')->where('product_hot', '1')->limit(4)->orderBy('product_id', 'asc')->get(),
            'sale' => DB::table('clothes_product')->where('product_sale', '1')->limit(4)->orderBy('product_upto', 'desc')->get(),
            'category' => DB::table('clothes_category')->orderBy('category_name', 'asc')->get(),
            'album' => DB::table('clothes_album')->get(),
            'content' => Cart::content(),
            'number' => Cart::count(),
            'total' => Cart::subtotal(0, '.', '.'),
        ];
        return view('pages.checkout', $data);
    }
    public function postCheckOut(Request $request)
    {
        $cartInfor = Cart::content();
        // save Customer
        $cus = new Customer;
        $cus->customer_name = $request->firstname;
        $cus->customer_email = $request->email;
        $cus->customer_address = $request->address;
        $cus->customer_phone = $request->phone;
        $cus->save();
        // save user
        $user = new User;
        $user->name = $request->firstname;
        $user->email = $request->email;
        if(isset($request->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        // save Order
        $order = new Order;
        $order->order_cus_id = $cus->customer_id;
        $order->order_date = date('Y-m-d H:i:s');
        $order->order_price = str_replace(',', '', Cart::subtotal());
        $order->order_status = 0;
        $order->save();
        // save Order detail
        foreach($cartInfor as $item) {
            $detail = new OrderDetail();
            $detail->detail_or_id = $order->order_id;
            $detail->detail_cus_id = $cus->customer_id;
            $detail->detail_name = $item->name;
            $detail->detail_price = $item->price;
            $detail->detail_number = $item->qty;
            $detail->save();
        }
        return redirect('home-sok/checkout/order/'.$order->order_id);
    }
    public function getOrder($id)
    {
        $data = [
            'hot' => DB::table('clothes_product')->where('product_hot', '1')->limit(4)->orderBy('product_id', 'asc')->get(),
            'sale' => DB::table('clothes_product')->where('product_sale', '1')->limit(4)->orderBy('product_upto', 'desc')->get(),
            'category' => DB::table('clothes_category')->orderBy('category_name', 'asc')->get(),
            'album' => DB::table('clothes_album')->get(),
            'content' => Cart::content(),
            'number' => Cart::count(),
            'total' => Cart::subtotal(0, '.', '.'),
            'order' => DB::table('clothes_order')->where('order_id', $id)->first()
        ];
        Cart::destroy();
        return view('pages.mes', $data);
    }
}
