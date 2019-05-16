<div class="box-product">
    <div class="special special--center row">
        <div class="wow fadeIn col-md-12" data-wow-duration="2s">
            <h5 class="special__title">Bộ sưu tập nổi bật</h5>
        </div>
        <div class="col-md-12">
            <a href="#" class="special__link">Bộ sưu tập</a>
        </div>
    </div>
    <div class="category">
        <div class="row">
            @foreach ($album as $item)
                <div class="col-3">
                    <a href="">
                        <div class="box box--min">
                            <div class="box__crop">
                                <img src="{{'img/' . $item->album_img}}"
                                    alt="" class="box__img">
                            </div>
                        </div>
                        <div class="category__title">
                            {{ $item->album_name }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
