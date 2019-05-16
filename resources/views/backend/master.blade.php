<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
</head>

<body>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100vh;
            width: 300px;
            box-shadow: 5px 0px 3px rgba(0, 0, 0, 0.3);
            background-color: #222222;
            overflow-x: hidden;
            padding-top: 16px;
        }

        .sidebar a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 16px;
            color: #818181;
            display: block;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .user {
            display: flex;
            align-items: center;
            color: #f1f1f1;
            padding: 20px;

        }

        .user__logo {
            width: 60px;
            line-height: 60px;
            text-align: center;
            border-radius: 50%;
            background: rgb(255, 127, 81);
            animation: fade 4s linear 0s infinite alternate forwards;
        }

        .user__name {
            padding: 0 20px;
            font-size: 14px;
            font-weight: 400;
        }
        i {
            flex: 0 0 25px;
        }
        .fa-fw {
            width: 0;
            text-align: left;
        }
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }
            .sidebar a {
                font-size: 18px;
            }
        }
        @keyframes fade {
            0% {background: rgba(225,127,81,1)}
            50% {background: rgba(12,14,255,0.5)}
            100% {background: rgba(2,127,81,0.7)}
        }
    </style>
    <div class="container-fluid" style="padding-left: 0">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-12">
                <div class="sidebar">
                    <div class="user">
                        <div class="user__logo">logo</div>
                        <div class="user__name">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <a href="{{ url('home') }}" class="d-flex align-items-center"><i class="fa fa-fw fa-home"></i> Home</a>
                    <a href="{{ url('admin/album') }}" class="d-flex align-items-center"><i class="fas fa-certificate"></i> Album</a>
                    <a href="{{ url('admin/category') }}" class="d-flex align-items-center"><i class="fas fa-cannabis"></i> Category</a>
                    <a href="{{ url('admin/product') }}" class="d-flex align-items-center"><i class="fas fa-carrot"></i> Products</a>
                    <a href="{{ url('admin/img') }}" class="d-flex align-items-center"><i class="fas fa-camera-retro"></i> Images</a>
                    <a href="{{ url('admin/user') }}" class="d-flex align-items-center"><i class="fa fa-fw fa-user"></i> Users</a>
                    <a href="{{ url('admin/order') }}" class="d-flex align-items-center"><i class="fab fa-cc-apple-pay"></i> Order</a>
                    <a href="{{ url('admin/logout') }}" style="margin-top: 40px" class="d-flex align-items-center"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-12">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
