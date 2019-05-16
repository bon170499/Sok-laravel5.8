@extends('backend.master')
@section('content')
<h3 class="display-3">Album</h3>
<a href="{{ url('admin/album/add') }}" class="btn btn-outline-secondary">Add album product</a>
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
            <th scope="col">Img</th>
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
                {{ $item->album_name }}
            </td>
            <td>
                <img src="{{asset('img/' . $item->album_img)}}" alt="" style="width: 100px">
            </td>
            <td>
                <a class="btn btn-outline-info btn-sm" href="{{ url('admin/album/edit/' . $item->album_id) }}">Edit</button>
                <a class="btn btn-outline-danger btn-sm" href="{{ url('admin/album/delete/' . $item->album_id) }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<ul class="pagination float-right">
    {{ $list->render() }}
</ul>
@endsection
