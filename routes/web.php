<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//------------------------------------------------------------------
// Login admin
Auth::routes();
// Admin
Route::get('home', function () {
    return redirect("admin/user");
});
Route::get('admin', function () {
    return redirect('login');
});
// Search
Route::get('search', [
    'as' => 'live-search',
    'uses' => 'pageController@searchName'
]);
Route::get('save', [
    'as' => 'ajaxlogin',
    'uses' => 'loginController@getSignUp'
]);
Route::get('savee', [
    'as' => 'ajaxlog',
    'uses' => 'loginController@getLogin'
]);

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {
    // LogOut
    Route::get('logout', function () {
        Auth::logout();
        return redirect('login');
    });
    // User
    Route::get('user', 'userController@getList');
    Route::get('user/add', 'userController@add');
    Route::post('user/add', 'userController@doAdd');
    Route::get('user/edit/{id}', 'userController@edit');
    Route::post('user/edit/{id}', 'userController@doEdit');
    Route::get('user/delete/{id}', 'userController@delete');
    // Album
    Route::get('album', 'albumController@getList');
    Route::get('album/add', 'albumController@add');
    Route::post('album/add', 'albumController@doAdd');
    Route::get('album/edit/{id}', 'albumController@edit');
    Route::post('album/edit/{id}', 'albumController@doEdit');
    Route::get('album/delete/{id}', 'albumController@delete');
    // Category product
    Route::get('category', 'categoryController@getList');
    Route::get('category/add', 'categoryController@add');
    Route::post('category/add', 'categoryController@doAdd');
    Route::get('category/edit/{id}', 'categoryController@edit');
    Route::post('category/edit/{id}', 'categoryController@doEdit');
    Route::get('category/delete/{id}', 'categoryController@delete');
    // Product
    Route::get('product', 'productController@getList');
    Route::get('product/add', 'productController@add');
    Route::post('product/add', 'productController@doAdd');
    Route::get('product/edit/{id}', 'productController@edit');
    Route::post('product/edit/{id}', 'productController@doEdit');
    Route::get('product/delete/{id}', 'productController@delete');
    // Img
    Route::get('img', 'imgController@getList');
    Route::get('img/add', 'imgController@add');
    Route::post('img/add', 'imgController@doAdd');
    Route::get('img/edit/{id}', 'imgController@edit');
    Route::post('img/edit/{id}', 'imgController@doEdit');
    Route::get('img/delete/{id}', 'imgController@delete');
    // Order
    Route::get('order', 'orderController@getList');
    Route::get('order/delete/{id}', 'orderController@delete');
    // Order detail
    Route::get('order-detail/{id}', 'orderDetailController@getList');
    Route::get('order-detail/update/{id}', 'orderDetailController@update');
});
//------------------------------------------------------------------
// Sok.
Route::get('home-sok', 'pageController@trangchu');
Route::group([
    'prefix' => 'home-sok'
], function () {
    Route::get('logout', function () {
        Auth::logout();
        return redirect('home-sok');
    });
    Route::get('san-pham/{id}', 'pageController@sanpham');
    Route::get('thong-tin-san-pham/{id}', 'pageController@thongtin');
    Route::get('gio-hang/{id}', [
        'as' => 'cart',
        'uses' => 'pageController@muahang'
    ]);
    Route::get('checkout', 'pageController@getCheckOut');
    Route::post('checkout', [
        'as' => 'checkout',
        'uses' => 'pageController@postCheckOut'
    ]);
    Route::get('checkout/order/{id}', [
        'as' => 'order',
        'uses' => 'pageController@getOrder'
    ]);
    // Giỏ hàng
    Route::get('gio-hang', [
        'as' => 'giohang',
        'uses' => 'pageController@giohang'
    ]);
    Route::get('xoa-san-pham/{id}', [
        'as' => 'delete',
        'uses' => 'pageController@xoaSanPham'
    ]);
    Route::get('xoa-san-pham2/{id}', [
        'as' => 'delete2',
        'uses' => 'pageController@xoaSanPham2'
    ]);
    Route::get('xoa-toan-bo', 'pageController@xoaToanBo');

    // Đăng nhập/ Đăng ký
    Route::post('dangnhap', [
        'as' => 'dangnhap',
        'uses' => 'pageController@dangnhap'
    ]);
    Route::post('dangky', [
        'as' => 'dangky',
        'uses' => 'pageController@dangky'
    ]);
    Route::get('cap-nhat', [
        'as' => 'capnhat',
        'uses' => 'pageController@capnhat'
    ]);
    Route::get('cap-nhat-cart', [
        'as' => 'updateCart',
        'uses' => 'pageController@updateCart'
    ]);
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
