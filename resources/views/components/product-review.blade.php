<div class="box-product" style="margin-top: 10rem">
    <div class="row">
        <div class="wow bounceInLeft col-md-12" data-wow-duration="2s">
            <h3 style="font-size: 2.4rem; margin: 2rem">Sản phẩm liên quan</h3>
        </div>
    </div>
    <div class="row">
        @php
            $pro = DB::table('clothes_product')->where('product_fk_id', $info->product_fk_id)->limit(6)->get();
        @endphp
        @foreach ($pro as $item)
        <div class="col-md-2 col-sm-6 col-6 product js-product">
            <div class="box">
                <div class="box__crop">
                    <a href="{{url('home-sok/thong-tin-san-pham/'. $item->product_id)}}">
                        <img src=" {{ asset('img/' . $item->product_img) }} "
                                        alt="" class="box__img">
                    </a>
                </div>
                <div class="overlay">
                        <span class="overlay__text js-button" id=" {!!$item->product_id!!} " style="cursor:pointer">Thêm vào giỏ</span>
                </div>
            </div>
            <a href="{{url('home-sok/thong-tin-san-pham/'. $item->product_id)}}" style="font-size: 1.2rem; margin: 1rem 0; display: block"> {{$item->product_name}} </a>
        </div>
        @endforeach
    </div>
</div>
