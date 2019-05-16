'<div class="item-cart">'
    .'<img src="public/img/' . $data['img'] .'" alt="" class="item-cart__img">'
    .'<div class="item-cart__link">'
        .'<a href="http://localhost/heroku/public/home-sok/thong-tin-san-pham/'. $data['id'] .'"> ' . $data['name'] .'</a>'
        .'<span>x' . $data['qty'] . '</span>'
        .'<a href="http://localhost/heroku/public/home-sok/xoa-san-pham2/' . $data['rowId'] .'" style="display: block"><i class="fas fa-trash-alt"></i></a>'
    .'</div>'
.'</div>';
