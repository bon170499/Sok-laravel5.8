<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Sok</title>
<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>

<body>

    @if (session('thongbao'))
        <div class="alert">
            <span class="alert-close">&times;</span>
            {{session('thongbao')}}
        </div>
    @endif
    <!-- end: load -->
    <!-- begin: search -->
    <div class="nav-search">
        <span class="btn-close js-search-close">&times;</span>
        <h5 class="nav-search__title">Bạn đang tìm kiếm sản phẩm nào?</h5>
        <div class="nav-search__content">
            <input type="text" placeholder="Search..." class="search-input" name="search" id="input-search">
        </div>
        <div class="content-search" style="width: 80%; overflow-y: auto">

        </div>
    </div>
    <!-- end: search -->
    <div class="nav-cart">
        <span class="btn-close js-cart-close">&times;</span>
        <div class="nav-cart__content">
            @php
                $cart = Cart::content();
            @endphp
            @foreach ($cart as $item)
                <div class="item-cart">
                    <img src="{{asset('img/' . $item->options->img)}}" alt="" class="item-cart__img">
                    <div class="item-cart__link">
                        <a href="{{url('home-sok/thong-tin-san-pham/'. $item->id)}}">{{$item->name}}</a>
                        <span>x {{$item->qty}} </span>
                        <a href="{!! url('home-sok/xoa-san-pham2', [$item->rowId]) !!}" style="display: block"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <h4 class="nav-cart__title">Tạm tính: <span class="nav-cart__total" style="float: right">{{Cart::subtotal(0, '.', '.')}} đ</span></h4>
        <div class="nav-cart__button">
            <a class="btn btn--dark" href="{!!url('home-sok/gio-hang')!!}" style="font-size: 1.4rem">Giỏ hàng</a>
        <a class="btn btn--dark" href="{!!url('home-sok/checkout')!!}" style="font-size: 1.4rem; <?php if(Cart::count() == 0): ?> display: none <?php endif; ?>" id="js-btn-cart">Thanh toán</a>
        </div>
    </div>
    <a href="{{ url('home-sok') }}">
        <img src="{{asset('img/logo-sok.png')}}" alt="" class="logo">
    </a>
    {{-- begin: nav-bar --}}
    @include('components.nav-bar')
    {{-- end: nav-bar --}}
    <!-- begin: page -->
    <div id="page">
        @yield('name-bg')
            <div class="container-fluid" id="header-fixed">
                <div class="header-main">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-7">
                            {{-- begin: nav --}}
                            @include('components.nav')
                            {{-- end: nav --}}
                        </div>
                        <div class="col-md-5">
                            <div class="contact">
                                <span class="contact__item fix-size">
                                    {{isset(Auth::user()->name) ? Auth::user()->name : ''}}
                                    @if (isset(Auth::user()->name))
                                        <a href=" {{url('home-sok/logout')}} " class="fix-logout">Đăng xuất</a>
                                    @endif
                                </span>
                                <span class="contact__item contact__item--search">
                                    <i class="fas fa-search js-search" style="cursor:pointer"></i>
                                </span>
                                @if (!isset(Auth::user()->name))
                                    <span class="contact__item contact__item--user">
                                        <i class="fas fa-user js-user" style="cursor: pointer"></i>
                                    </span>
                                @endif
                                <span class="contact__item contact__item--cart">
                                        <i class="fas fa-shopping-cart js-cart"></i>
                                    <span class="ajax-count"> {{Cart::count()}} </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-res">
                    <div class="row align-items-center">
                        <div class="col-sm-1 col-1">
                            <div class="burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-3">
                            <img src="img/logo-sok.png" alt="" class="logo-fix" style="margin-left: 10px">
                        </div>
                        <div class="col-sm-8 col-8">
                            <div class="contact">
                                <span class="contact__item fix-size">
                                    {{isset(Auth::user()->name) ? Auth::user()->name : ''}}
                                    @if (isset(Auth::user()->name))
                                        <a href=" {{url('home-sok/logout')}} " class="fix-logout">Đăng xuất</a>
                                    @endif
                                </span>
                                <span class="contact__item contact__item--search">
                                    <i class="fas fa-search js-search" style="cursor:pointer"></i>
                                </span>
                                @if (!isset(Auth::user()->name))
                                    <span class="contact__item contact__item--user">
                                        <i class="fas fa-user js-user" style="cursor: pointer"></i>
                                    </span>
                                @endif
                                <span class="contact__item contact__item--cart">
                                        <i class="fas fa-shopping-cart js-cart"></i>
                                    <span class="ajax-count">{{Cart::count()}}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- begin: Background --}}
                @yield('background')
                {{-- end: Background --}}
            </div>
        </header>
        {{-- begin: Content --}}
        @yield('content')
        {{-- end: Content --}}
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="f-item">
                            <h5 class="f-item__title">Công ty</h5>
                            <div class="f-item__content">
                                <a href="#" class="f-item__link">Về Sok.</a>
                                <a href="#" class="f-item__link">Địa chỉ cửa hàng</a>
                                <a href="#" class="f-item__link">Đổi trả hàng</a>
                                <a href="#" class="f-item__link">Thương hiệu</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="f-item">
                            <h5 class="f-item__title">Dịch vụ</h5>
                            <div class="f-item__content">
                                <a href="#" class="f-item__link">Mua hàng trực tuyến</a>
                                <a href="#" class="f-item__link">Đặt làm đồng phục</a>
                                <a href="#" class="f-item__link">Hợp tác thương hiệu</a>
                                <a href="#" class="f-item__link">Thẻ/Voucher quà tặng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="f-item">
                            <h5 class="f-item__title">Mạng xã hội</h5>
                            <div class="f-item__content">
                                <a href=" {{url('https://www.facebook.com/tunggleee')}} " class="f-item__link"><i class="fab fa-facebook"></i> Facebook</a>
                                <a href="{{url('https://www.facebook.com/tunggleee')}}" class="f-item__link"><i class="fab fa-instagram"></i> Instagram</a>
                                <a href="{{url('https://www.facebook.com/tunggleee')}}" class="f-item__link"><i class="fab fa-youtube"></i> Youtube</a>
                                <a href="{{url('https://www.facebook.com/tunggleee')}}" class="f-item__link"><i class="fab fa-pinterest-square"></i> Pinterest</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-12">
                        <div class="f-item">
                            <h5 class="f-item__title">Chính sách</h5>
                            <div class="f-item__content">
                                <a href="#" class="f-item__link">Thanh toán và vận chuyển</a>
                                <a href="#" class="f-item__link">Đổi trả/ Hoàn tiền</a>
                                <a href="#" class="f-item__link">Bảo mật và chia sẻ thông tin</a>
                                <a href="#" class="f-item__link">Trợ giúp khách hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="font-size: 1.6rem">BonBon</h5>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end: page -->
    @include('components.login')
    <div class="scroll-link js-scroll"><i class="fas fa-arrow-up"></i></div>
    <script src="js/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
         new WOW().init();
    </script>
    {{-- Search --}}
    <script>
        $(document).ready(function () {
            $('#input-search').keyup(function(){
                let query = $(this).val().toUpperCase();
                $.ajax({
                    url: "{{ route('live-search') }}",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        query: query
                    },
                    success: function(data){
                        $('.content-search').html(data.item);
                    }
                })
            })
        });
    </script>
    {{-- SignUp --}}
    <script>
        $(document).ready(function () {
            $('.js-pass-up').focus(function (e) {
                $('.js-dangky').attr('disabled', true);
                $('.js-dangky').css('opacity', '0.5');
                e.preventDefault();
                let email = $('.js-email-up').val();
                let pass = $(this).val();
                let name = $('#uname2').val();
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('ajaxlogin')}}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        email: email,
                        pass: pass,
                        _token: _token
                    },
                    success: function (data) {
                        if (data.item == "datontai") {
                            $('.js-dangky').attr('disabled', true);
                            $('.js-dangky').css('opacity', '0.5');
                            $('.user-small').html("Email đã được sử dụng để đăng ký");
                            $('.js-pass-up').val("");
                        } else if (data.item == "chuatontai") {
                            $('.js-dangky').attr('disabled', false);
                            $('.js-dangky').css('opacity', '1');
                            $('.user-small').html("Email có thể sử dụng");
                            $('.js-pass-up').val("");
                        }
                    }
                })
            })
        })
    </script>
    {{-- SignIn --}}
    <script>
        $(document).ready(function(){
            $('#emailSI').blur(function(e){
                e.preventDefault();
                let email = $('#emailSI').val();
                let pass = $('#passSignIn').val();
                let token = $('input[name="_token"]').val();
                let btn = $('.js-login');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('ajaxlog')}}",
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        email: email,
                        pass: pass,
                        token: token
                    },
                    success: function(data){
                        if(data.item === "chuatontai"){
                            $('#small-in').html("Tài khoản không đúng");
                            // $('#small-in').html(data.pass);
                            btn.attr('disabled', true);
                            btn.css('opacity', '0.5');
                        }else if(data.item === "datontai"){
                            $('#small-in').html('');
                            btn.attr('disabled', false);
                            btn.css('opacity', '1');
                        }
                    }
                })
            })
        })
    </script>
    {{-- Update cart --}}
    <script>
        $(document).ready(function(){
            $(".qty").change(function() {
                let rowId = $(this).attr("id");
                let qty = $(this).val();
                let token = $("input[name='_token']").val();
                $.ajax({
                    // url: ,
                    url: "{{route('capnhat')}}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        "_token": token,
                        "id": rowId,
                        "qty": qty
                    },
                    success: function(data){
                        if(data.item == 'giatien'){
                            $('#total').html(data.fee + " đ");
                            $('#count').html(data.count);
                        }
                    }
                });
            })
        })
    </script>
    {{-- Cart --}}
    <script>
        $(document).ready(function(){
            $('.js-button').click(function(){
                let id = $(this).attr("id");
                let openCart = document.querySelector('.nav-cart');
                openCart.classList.add('nav-active-user');
                $.ajax({
                    url: "{{route('updateCart')}}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'id': id
                    },
                    success: function(data){
                        $('.nav-cart__content').html(data.output);
                        $('.nav-cart__total').html(data.total + " đ");
                        $('.ajax-count').html(data.count);
                        if(data.count > 0){
                            $('#js-btn-cart').css({
                                'display': 'inline-block'
                            })
                        }
                    }
                })
            })
        })
    </script>
    {{-- Alert --}}
    <script>
        var close = document.querySelectorAll(".alert-close");
        for (let i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
    @yield('javascript')
</body>

</html>
