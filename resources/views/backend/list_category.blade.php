@extends('backend.master')
@section('content')
<h3 class="display-3">Category products</h3>
<a href="{{ url('admin/category/add') }}" class="btn btn-outline-secondary">Add category product</a>
@if (session('thongbao'))
    <div class="alert alert-danger">
        {{session('thongbao')}}
    </div>
@endif
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Stt</th>
            <th scope="col">Name</th>
            <th scope="col">Album</th>
            <th scope="col">Sex</th>
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
                {{ $item->category_name }}
            </td>
            <td>
                @php
                    $album = DB::table('clothes_album')->where('album_id', $item->category_ab_id)->first();
                @endphp
                {{ $album->album_name }}
            </td>
            <td>
                @if ($item->category_sex == 0)
                    Nữ
                @else
                    Nam
                @endif
            </td>
            <td>
                <a class="btn btn-outline-info btn-sm" href="{{ url('admin/category/edit/' . $item->category_id) }}">Edit</button>
                <a class="btn btn-outline-danger btn-sm" href="{{ url('admin/category/delete/' . $item->category_id) }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<ul class="pagination float-right">
    {{ $list->render() }}
</ul>
@endsection
