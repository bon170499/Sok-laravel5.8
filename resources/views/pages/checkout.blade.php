@extends('pages.master')
@section('name-bg')
<header class="background" style="background-image: url('{{asset('img/pexels-photo-871494.jpeg')}}');">
@endsection

@section('background')
    <div class="header-category js-hidden">
        <h3 class="header-category__head">
            Checkout
        </h3>
    </div>
@endsection

@section('content')
    <section class="main main-checkout main-cart main-category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-12">
                    <div class="container">
                        <form action=" {{route('checkout')}} " method="post">
                            <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <h3>Hoá đơn chi tiết</h3>
                                    <div class="form-gr">
                                        <label for="fname"> Tên đầy đủ</label>
                                        <input type="text" id="fname" name="firstname" placeholder="Your name.." autocomplete="off" required>
                                    </div>
                                    <div class="form-gr">
                                        <div class="user-small" style="color: red; font-style: italic"></div>
                                        <label for="email"> Email</label>
                                        <input type="email" id="email" name="email" placeholder="example@gmail.com" autocomplete="off" required class="js-email-up js-ajax-up">
                                    </div>
                                    <div class="form-gr">
                                        <label for="adr"> Địa chỉ</label>
                                        <input type="text" id="adr" name="address" placeholder="Address.." autocomplete="off" required>
                                    </div>
                                    <div class="form-gr">
                                        <label for="phone"> Điện thoại</label>
                                        <input type="number" id="phone" name="phone" placeholder="Phone.." autocomplete="off" required>
                                    </div>
                                    <div class="form-gr" style="border:none">
                                        <label for="checkbox"><input type="checkbox" id="checkbox" name="checkbox" class="js-checkbox"> Tạo tài khoản mới</label>
                                    </div>
                                    <div class="form-gr js-hidden-pass" style="display:none">
                                        <small style="font-style: italic; font-weight: 600">Vui lòng nhập mật khẩu nếu muốn tạo tài khoản mới. Nếu đã có tài khoản, vui lòng đăng nhập ở đầu trang</small>
                                        <label for="passOut"> Password</label>
                                        <input type="password" id="passOut" name="password" placeholder="Password" class="js-pass-up js-ajax-up">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Xác thực đơn hàng" class="js-dangky"> {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-12">
                    <div class="container">
                        <h4 style="margin: 1rem 0">Giỏ hàng <span class="price" style="color:black"><b> {{$number}} </b></span></h4>
                        @foreach ($content as $item)
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-12">
                                <p style="font-size: 1.2rem"><a href="#"> {!!$item->name!!} x {{$item->qty}} </a> </p>
                            </div>
                            <div class="col-md-4">
                                <span class="cart-fee__price"> {!!number_format($item->price*$item->qty, 0, '.', '.')!!} đ</span>
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-md-8 col-sm-8 col-8">
                                <h4 style="margin: 1rem 0">Phí vận chuyển</h4>
                            </div>
                            <div class="col-md-4 col-sm-4 col-4">
                                <span style="float: right">Freeship</span>
                            </div>
                        </div>
                        <hr>
                        <h4 style="margin: 1rem 0">Lựa chọn hình thức thanh toán</h4>
                        <div class="filter" style="font-size: 0.8rem">
                            <div class="filter-search">
                                <label for="payy">
                                    <input type="radio" name="quality" id="payy" class="" checked>
                                    <span>Thanh toán khi nhận hàng</span>
                                </label>
                                <label for="payyy">
                                    <input type="radio" name="quality" id="payyy" class="" disabled>
                                    <span>Thanh toán thông qua chuyển khoản</span>
                                    <small><i>Chức năng đang bảo trì</i></small>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <p><b>Tổng tiền</b> <span class="price" style="color:black"><b> {{$total}} đ</b></span></p>
                    </div>
                </div>
            </div>
        </div>
        @include ('components.album');
    </section>
@endsection
@section('javascript')
    <script src="{{asset('js/checkout.js')}}"></script>
@endsection
