@extends('backend.master')
@section('content')
<style>
    table tr th,
    table tr td {
        padding: 0.4rem !important;
    }
</style>
<h3 class="display-3">List order</h3>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $item)
            <tr>
                <th> {{$key+1}} </th>
                <td>
                    @php
                        $customer = App\Order::find($item->order_id)->joinCustomer;
                    @endphp
                    {{$customer->customer_name}}
                </td>
                <td> {{$item->order_date}} </td>
                <td> {{number_format($item->order_price, 0, '.', '.')}} </td>
                <td>
                    @if ($item->order_status == 0)
                    <p>Chưa giao hàng</p>
                    @else
                    <p style="color: red">Đã giao hàng</p>
                    @endif
                </td>
                <td>
                    <a class="btn btn-outline-info btn-sm" href="{{ url('admin/order-detail/' . $item->order_id) }}">Chi tiết</button>
                    <a class="btn btn-outline-danger btn-sm" href="{{ url('admin/order/delete/' . $item->order_id) }}">Xoá</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<ul class="pagination float-right">
    {{ $list->render() }}
</ul>
@endsection
