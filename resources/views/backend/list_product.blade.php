@extends('backend.master')
@section('content')
<style>
    table tr th,
    table tr td {
        padding: 0.4rem !important;
    }
</style>
<h3 class="display-3">List products</h3>
<a href="{{ url('admin/product/add') }}" class="btn btn-outline-secondary">Add product</a>
@if (session('thongbao'))
    <div class="alert alert-danger">
        {{session('thongbao')}}
    </div>
@endif
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Stt</th>
                <th scope="col">Name</th>
                <th scope="col">Img</th>
                <th scope="col">Category</th>
                <th scope="col">Sex</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Hot</th>
                <th scopr="col">Sale</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $item)
            <tr>
                <th scope="row">
                    {{ $key + 1 }}
                </th>
                <td>
                    {{ substr($item->product_name, 0, 40) }}...
                </td>
                <td>
                    <img src="{{ asset('img/' . $item->product_img) }}" alt="img" style="width: 40px; height: auto;">
                </td>
                <td>
                    @php
                        $category = App\Product::find($item->product_id)->joinCategory
                    @endphp
                    {{ $category->category_name }}
                </td>
                <td>
                    @if ($category->category_sex == 0) Nữ @else Nam @endif
                </td>
                <td>
                    {{ $item->product_price }}
                </td>
                <td>
                    {{ substr($item->product_desc, 0, 30) }}...
                </td>
                <td>
                    <input type="checkbox" @if ($item->product_hot == 1) checked @endif>
                </td>
                <td>
                    <input type="checkbox" @if ($item->product_sale == 1) checked> {{ $item->product_upto . '%'}} @endif
                </td>
                <td>
                    <a class="btn btn-outline-info btn-sm" href="{{ url('admin/product/edit/' . $item->product_id) }}">Edit</a>
                    <a class="btn btn-outline-danger btn-sm" href="{{ url('admin/product/delete/' . $item->product_id) }}">Delete</a>
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
