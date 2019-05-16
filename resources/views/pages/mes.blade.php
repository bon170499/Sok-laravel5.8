@extends('pages.master')
@section('name-bg')
<header class="background" style="background-image: url('{{asset('img/pexels-photo-871494.jpeg')}}');">
@endsection

@section('background')
<div class="header-category js-hidden">
    <h3 class="header-category__head">
        Order
    </h3>
</div>
@endsection
@section('content')
<section class="main-order main-cart">
    <div class="container-fluid">
        <h3 class="information"><i class="far fa-check-circle"></i> Cám ơn. Đơn hàng của bạn đã được nhận.</h3>
        <div class="order">
            <div class="row">
                <div class="col-md-3">
                    <div class="order__title">Mã đơn hàng</div>
                    <div class="order__desc"> {{$order->order_id}} </div>
                </div>
                <div class="col-md-3">
                    <div class="order__title">Ngày đặt hàng</div>
                    <div class="order__desc"> {{$order->order_date}} </div>
                </div>
                <div class="col-md-3">
                    <div class="order__title">Tổng tiền</div>
                    <div class="order__desc"> {{number_format($order->order_price, 0, '.', '.')}}đ </div>
                </div>
                <div class="col-md-3">
                    <div class="order__title">Thanh toán</div>
                    <div class="order__desc">Sau khi nhận hàng</div>
                </div>
            </div>
            <hr>
            <div class="order-detail">
                <div class="container">
                    <h4 style="margin: 1rem 0; font-size: 2rem">Hoá đơn chi tiết <span class="price" style="color:black"><b>
                            </b></span></h4>
                    <hr>
                    @foreach ($content as $item)
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-12">
                            <p style="font-size: 1.2rem"><a href="#"> {!!$item->name!!} x {{$item->qty}} </a> </p>
                        </div>
                        <div class="col-md-4">
                            <span class="cart-fee__price">{!!number_format($item->price*$item->qty, 0, '.', '.')!!} đ</span>
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
                    <p><b>Tổng tiền</b> <span class="price" style="color:black; float: right"><b> {{$total}}đ</b></span></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
