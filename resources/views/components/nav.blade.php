<nav class="nav">
    <ul class="nav__content">
        <li class="nav__item"><a href=" {{ url('home-sok') }} " class="nav__link">Trang chủ</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Bộ sưu tập</a></li>
        <li class="nav__item drop">
            <a href="#" class="nav__link">Sản phẩm</a>
            <div class="drop__content">
                @php
                    $category = DB::table('clothes_category')->get();
                @endphp
                @foreach ($category as $item)
            <a href="home-sok/san-pham/{{$item->category_id}}" class="drop__item">{{ $item->category_name }}</a>
                @endforeach
            </div>
        </li>
        <li class="nav__item"><a href="#" class="nav__link">Giới thiệu</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Liên hệ</a></li>
    </ul>
</nav>
