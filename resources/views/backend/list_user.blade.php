@extends('backend.master')
@section('content')
<h3 class="display-3">List Users</h3>
<a href="{{ url('admin/user/add') }}" class="btn btn-outline-secondary">Add user</a>
@if (session('thongbao'))
    <div class="alert alert-info">
        {{session('thongbao')}}
    </div>
@endif
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Stt</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
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
                {{ $item->name }}
            </td>
            <td>
                {{ $item->email }}
            </td>
            <td>
                <a class="btn btn-outline-info btn-sm" href="{{ url('admin/user/edit/' . $item->id) }}">Edit</button>
                <a class="btn btn-outline-danger btn-sm" href="{{ url('admin/user/delete/' . $item->id) }}">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<ul class="pagination float-right">
    {{ $list->render() }}
</ul>
@endsection
