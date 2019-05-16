<div class="box-product">
    <div class="special row">
        <div class="wow bounceInLeft col-md-12 col-sm-12 col-12" data-wow-duration="2s">
            <h5 class="special__title">Sản phẩm nổi bật</h5>
        </div>
    </div>
    <div class="row">
        @foreach ($hot as $item)
            <div class="col-md-3 col-sm-6 col-6 product">
                @if ($item->product_sale == 1)
                    <span class="product__sale"> {{ $item->product_upto }}% </span>
                @endif
                <div class="box">
                    <div class="box__crop">
                        <a href=" {{url('home-sok/thong-tin-san-pham/'. $item->product_id)}} ">
                        <img src="{{asset('img/' . $item->product_img)}}"
                                    alt="" class="box__img">
                            </a>
                    </div>
                    <div class="overlay">
                        <span class="overlay__text js-button" id=" {!!$item->product_id!!} " style="cursor:pointer">Thêm vào giỏ</span>
                    </div>
                </div>
                <a href="{{url('home-sok/thong-tin-san-pham/'. $item->product_id)}}" class="product__title"> {{ $item->product_name }} </a>
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
                        <p class="product__desc">{{ number_format($fee, 0, '.', '.') }}đ</p>
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
