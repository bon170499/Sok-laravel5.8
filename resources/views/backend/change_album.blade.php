@extends('backend.master')
@section('content')
<section style="width:60%; margin: auto">
    <h3 class="display-3">Change album</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter album name.." autocomplete="off"
            name="name" value="{{ isset($record->album_name) ? $record->album_name : '' }}">
        </div>
        <div class="form-group">
            <label for="img">Img</label>
            <input type="file" name="img" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-outline-danger">Submit</button> {{ csrf_field() }}
    </form>
</section>
@endsection
