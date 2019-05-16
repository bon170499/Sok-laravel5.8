@extends('backend.master')
@section('content')
<h3 class="display-3">Images</h3>
<a href="{{ url('admin/img/add') }}" class="btn btn-outline-secondary">Add img product</a>
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Stt</th>
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
                <img src="{{asset('img/' . $item->img_img)}}" alt="" style="width: 30px">
            </td>
            <td>
                <a class="btn btn-outline-info btn-sm" href="{{ url('admin/img/edit/' . $item->img_id) }}">Edit</button>
                <a class="btn btn-outline-danger btn-sm" href="{{ url('admin/img/delete/' . $item->img_id) }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<ul class="pagination float-right">
    {{ $list->render() }}
</ul>
@endsection
