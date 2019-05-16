@extends('pages.master')
@section('name-bg')
<header class="background" style="background-image: url({{asset('img/pexels-photo-1536619.jpeg')}});">
@endsection
@section('background')
    <div class="header-title js-hidden">
        <h3 class="header-title__head">
            Bộ sưu tập hè 2019
        </h3>
        <h5 class="header-title__desc">
            Thoả mãn sự sáng tạo và tự tin với những outfit của riêng mình..
        </h5>
    </div>
@endsection
@section('content')
<!-- begin: load -->
<div class="js-load animationload">
    <div class="js-loader osahanloading"></div>
</div>
<script>
    let load = document.querySelector('.js-load');
    let loader = document.querySelector('.js-loader');
    setTimeout(function(){
        load.classList.remove('animationload');
        loader.classList.remove('osahanloading');
    }, 3000);
</script>
<!-- begin: main -->
<section class="main">
    <div class="container-fluid">
        <div class="title">
            <img src="{{asset('img/icon-basic.png')}}" alt="" class="title_we">
            <h3 class="wow bounceInDown title__head" data-wow-duration="1s">
                Sok. nhí nhố, hành quân săn sale
            </h3>
            <p class="title__desc">
                Xem ngay những items phải có trong tủ quần áo của mình mùa xuân hè 2019. Đồng thời, cập nhật xu hướng mới nhất với những thiết kế không thể thiếu như áo thun, áo sơ mi, quần short, quần jeans hay jumpsuit. Qua đó thoả mãn sự sáng tạo và tự tin với outfit của riêng mình.
            </p>
        </div>
        <div class="box-entry">
            <div class="row">
                <div class="wow fadeInLeft col-md-4 col-sm-12 col-12 entry" data-wow-duration="1s">
                    <img src=" {{asset('img/icon-mail.png')}} " alt="" class="entry__img">
                    <div class="entry__desc">
                        Sale Upto 50%
                    </div>
                </div>
                <div class="wow fadeInDown col-md-4 col-sm-12 col-12 entry" data-wow-duration="1s">
                    <img src="{{asset('img/icon-mail.png')}}" alt="" class="entry__img">
                    <div class="entry__desc">
                        Toàn bộ mặt hàng (*)
                    </div>
                </div>
                <div class="wow fadeInRight col-md-4 col-sm-12 col-12 entry" data-wow-duration="1s">
                    <img src="{{asset('img/icon-mail.png')}}" alt="" class="entry__img">
                    <div class="entry__desc">
                        Xuyên suốt hè 2019
                    </div>
                </div>
            </div>
        </div>
    {{-- begin: Product hot --}}
    @include('components.product-hot')
    {{-- end: Product hot --}}

    {{-- begin: Product sale --}}
    @include ('components.product-sale')
    {{-- end: Product sale --}}
    </div>
    @include ('components.album');
</section>
<!-- end: main -->
@endsection
