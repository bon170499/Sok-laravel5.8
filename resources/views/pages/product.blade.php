@extends('pages.master')
@section('name-bg')
    <header class="background" style="background-image: url('{{asset('img/pexels-photo-371110.jpeg')}}');">
@endsection
@section('background')
    <div class="header-category js-hidden">
        <h3 class="header-category__head">
            Clothing
        </h3>
        <h5 class="header-category__desc">
            Sản phẩm | {{ $bread->category_name }}
        </h5>
    </div>
@endsection
@section('content')
<section class="main main-category">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="stick-filter">
                        <div class="filter">
                            <div class="filter-search">
                                <label for="all">
                                    <input type="radio" name="quality" id="all" checked class="js-all">
                                    <span>Tất cả sản phẩm</span>
                                </label>
                            </div>
                            <div class="filter-title">
                                Khoảng giá
                            </div>
                            <div class="filter-search">
                                <label for="min">
                                    <input type="radio" name="quality" id="min" class="js-min">
                                    <span>Dưới 300.000 VNĐ</span>
                                </label>
                                <label for="s-min">
                                        <input type="radio" name="quality" id="s-min" class="js-sMin">
                                        <span>300.000 - 500.000 VNĐ</span>
                                    </label>
                                <label for="m-min">
                                    <input type="radio" name="quality" id="m-min" class="js-mMin">
                                    <span>500.000 - 700.000 VNĐ</span>
                                </label>
                                <label for="max">
                                    <input type="radio" name="quality" id="max" class="js-max">
                                    <span>Trên 700.000 VNĐ</span>
                                </label>
                            </div>
                        </div>
                        <div class="filter">
                            <div class="filter-title">
                                Khuyến mãi
                            </div>
                            <div class="filter-search">
                                <label for="sale-min">
                                    <input type="radio" name="quality" id="sale-min" class="js-sale-min">
                                    <span>Dưới 10%</span>
                                </label>
                                <label for="sale-s-min">
                                        <input type="radio" name="quality" id="sale-s-min" class="js-sale-sMin">
                                        <span>10% - 30%</span>
                                    </label>
                                <label for="sale-m-min">
                                    <input type="radio" name="quality" id="sale-m-min" class="js-sale-mMin">
                                    <span>30% - 50%</span>
                                </label>
                                <label for="sale-max">
                                    <input type="radio" name="quality" id="sale-max" class="js-sale-max">
                                    <span>Trên 50%</span>
                                </label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box-product">
                    <div class="row">
                        @foreach ($product as $item)
                            <div class="col-md-3 col-sm-6 col-6 product js-product">
                                @if ($item->product_sale == 1)
                                    <span class="product__sale js-sale">{{ $item->product_upto }}%</span>
                                @endif
                                <div class="box">
                                    <div class="box__crop">
                                        <a href="{{url('home-sok/thong-tin-san-pham/'. $item->product_id)}}">
                                                <img src="{{asset('img/' . $item->product_img)}}"
                                                    alt="" class="box__img">
                                            </a>
                                    </div>
                                    <div class="overlay">
                                            <span class="overlay__text js-button" id=" {!!$item->product_id!!} " style="cursor:pointer">Thêm vào giỏ</span>
                                    </div>
                                </div>
                                <a href="{{url('home-sok/thong-tin-san-pham/'. $item->product_id)}}" class="product__title"> {{$item->product_name}} </a>
                                @php
                                $fee = $item->product_price;
                                $sale = $item->product_upto;
                                if($item->product_sale == 1){
                                    $oldFee = $fee;
                                    $fee = $fee - $sale/100*$fee;
                                }
                                @endphp
                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-8">
                                        <p class="product__desc js-fee">{{$fee}}đ</p>
                                    @if ($item->product_sale == 1)
                                        <p class="product__price"> {{ number_format($oldFee, 0, '.', '.') }}đ</p>
                                    @endif
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-4">
                                        <span class="product__hidden js-button" id=" {!!$item->product_id!!} ">
                                            <i class="fas fa-cart-plus "></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include ('components.album');
</section>
@endsection
@section('javascript')
<script src="{{asset('js/filter.js')}}"></script>
@endsection
