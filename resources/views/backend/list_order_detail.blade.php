@extends('backend.master')
@section('content')
<style>
    .desc {
        font-size: 14px;
        color: rgba(0, 0, 0, 0.8);
    }

    .title {
        font-size: 16px;
        font-weight: 600;
    }
</style>
<h3 class="display-3">Order detail</h3>
@if ($order->order_status == 0)
    <a class="btn btn-outline-danger" href=" {{url('admin/order-detail/update/' . $order->order_id)}} ">Giao hàng</a>
@else
    <button class="btn btn-outline-info">Đã giao hàng</button>
@endif
<div class="row">
    <div class="col-md-2"><span class="title">Khách hàng:</span></div>
    <div class="col-md-10"><span class="desc"> {{$customer->customer_name}} </span></div>
</div>
<div class="row">
    <div class="col-md-2"><span class="title">Địa chỉ:</span></div>
    <div class="col-md-10"><span class="desc"> {{$customer->customer_address}} </span></div>
</div>
<div class="row">
    <div class="col-md-2"><span class="title">Điện thoại:</span></div>
    <div class="col-md-10"><span class="desc"> {{$customer->customer_phone}} </span></div>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $item)
            <tr>
                <th> {{$key+1}} </th>
                <td> {{$item->detail_name}} </td>
                <td> {{number_format($item->detail_price, 0, '.', '.')}} </td>
                <td> {{$item->detail_number}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<button class='btn btn-outline-dark' onclick="history.go(-1)">Back</button>
@endsection
