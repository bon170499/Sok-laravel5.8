<div class="nav-bar">
    <span class="btn-close js-nav-close">&times;</span>
    <ul>
        <li><a href="{{ url('home-sok') }}">Trang chủ</a></li>
        <li>
            <span id="js-nav-hidden">Sản phẩm</span>
            <div class="nav-hidden">
                @php
                    $category = DB::table('clothes_category')->get();
                    @endphp
                @foreach ($category as $item)
                <a href="{{ url('home-sok/san-pham/' . $item->category_id) }}">{{ $item->category_name }}</a>
                @endforeach
            </div>
        </li>
        <li><a href="{{ url('home-sok') }}">Bộ sưu tập</a></li>
        <li><a href="{{ url('home-sok') }}">Giới thiệu</a></li>
        <li><a href="{{ url('home-sok') }}">Liên hệ</a></li>
    </ul>
</div>
