@extends('pages.master')
@section('name-bg')
<header class="background" style="background-image: url({{asset('img/pexels-photo-911601.jpeg')}});">
@endsection

@section('background')
    <div class="header-category js-hidden">
        <h3 class="header-category__head">
            Cart
        </h3>
    </div>
@endsection

@section('content')
    <section class="main-cart">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12">
                    <div class="cart-title">
                        <div class="row">
                            <div class="col none">Sản phẩm</div>
                            <div class="col">Ảnh</div>
                            <div class="col">Giá</div>
                            <div class="col">Số lượng</div>
                            <div class="col">
                                <a href=" {!! url('home-sok/xoa-toan-bo') !!} " style="text-decoration: underline">Xoá</a>
                            </div>
                        </div>
                    </div>
                    <form action="" method="get">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @php
                        $sumOld = 0;
                        $sumNew = 0;
                    @endphp
                    @foreach ($content as $item)
                        @php
                            $sumOld += $item->options->old*$item->qty;
                            $sumNew += $item->price*$item->qty;
                        @endphp
                        <div class="cart-info">
                            <div class="row align-items-center">
                                <div class="col none">
                                    <a href="{{url('home-sok/thong-tin-san-pham/'. $item->options->id)}}">{!!$item->name!!}</a>
                                </div>
                                <div class="col">
                                    <a href="{{url('home-sok/thong-tin-san-pham/'. $item->options->id)}}">
                                        <img src="{!!asset('img/' . $item->options->img)!!}" alt="" class="cart-info__img">
                                    </a>
                                </div>
                                <div class="col">
                                    <ul class="cart-info__price">
                                        <li>
                                            @if ($item->options->sale == 1)
                                                {!!number_format($item->options->old, 0, '.', '.')!!}đ
                                            @endif
                                        </li>
                                        <li>{{number_format($item->price, 0, '.', '.')}}đ</li>
                                        <li>
                                            @if ($item->options->sale == 1)
                                                {!!$item->options->upto!!} %
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="col cart-info__number">
                                    <input type="number" min="1" class="qty" value="{!! $item->qty !!}" id="{!!$item->rowId!!}">
                                </div>
                                <div class="col">
                                    <a href="{!! url('home-sok/xoa-san-pham', [$item->rowId]) !!}">X</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ csrf_field() }}
                </form>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="cart-sticky">
                        <div class="cart-fee">
                            <h4 style="margin: 1rem 0">Giỏ hàng <span class="cart-fee_price" id="count" style="color:black; float: right"> {{Cart::count()}}</span></h4>
                            @foreach ($content as $item)
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-12">
                                    <p style="font-size: 1.2rem"><a href="#"> {!!$item->name!!} </a> </p>
                                </div>
                                <div class="col-md-4">
                                    <span class="cart-fee__price"> {!!number_format($item->price, 0, '.', '.')!!} đ</span>
                                </div>
                            </div>
                            @endforeach
                            <hr>
                            <p>Tổng tiền <span class="cart-fee__price" style="color:black"><b id="total"> {{$total}} đ</b></span></p>
                        </div>
                        <div class="cart-btn">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <a class="btn btn--dark btn--full" href="{!!url('home-sok/')!!}" style="font-size: 1.4rem">Tiếp tục mua sắm</a>
                                </div>
                                @if (Cart::count() > 0)
                                <div class="col-md-6 col-sm-6 col-6">
                                    <a class="btn btn--dark btn--full" href="{!!url('home-sok/checkout')!!}" style="font-size: 1.4rem">Thanh toán</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
