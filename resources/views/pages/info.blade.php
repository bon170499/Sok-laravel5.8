@extends('pages.master')
@section('name-bg')
<header>
@endsection

@section('content')
    <section class="main-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 info-left">
                    <div class="row">
                        @foreach ($img as $item)
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="info-img">
                                <div class="info-img__crop">
                                    <img src="{{asset('img/' . $item->img_img)}}" alt="" class="js-modal">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="info-right">
                        @if ($info->product_sale == 1)
                            <p class="info-right__sale">Sale {{$info->product_upto}}% </p>
                        @endif
                        <h3 class="info-right__name"> {{$info->product_name}} </h3>
                        @php
                            $fee = $info->product_price;
                            $sale = $info->product_upto;
                            if($info->product_sale == 1){
                                $oldFee = $fee;
                                $fee = $fee - $sale/100*$fee;
                            }
                        @endphp
                        @if ($info->product_sale == 1)
                        <p class="info-right__old">{{ number_format($oldFee, 0, '.', '.') }}đ </p>
                        @endif
                        <p class="info-right__new">{{number_format($fee, 0, '.', '.')}} đ</p>
                        <a class="btn btn--dark js-button" id=" {!!$info->product_id!!} ">Thêm vào giỏ hàng</a>
                        <div class="info-right__desc">
                            <div class="js-desc after-desc" style="cursor:pointer">Mô tả sản phẩm</div>
                            <p class=""> {!! $info->product_desc !!} </p>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.product-review')
        </div>
    </section>
    <div id="myModal" class="modall">
        <span id="modal-close">&times;</span>
        <img class="modal-contentt" id="img01">
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/info.js')}}"></script>
@endsection
