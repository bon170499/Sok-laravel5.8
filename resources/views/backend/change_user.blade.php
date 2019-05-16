@extends('backend.master')
@section('content')
<section style="width:50%; margin: auto">
    <h3 class="display-3">Add edit User</h3>
    @if (Request::get('err') == 'user_exist')
    <div class="alert alert-danger">Tên người dùng hoặc email đã tồn tại</div>
    @endif
    <form action="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="exampleInputName">Fullname</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Fullname" require autocomplete="off" name="name"
                value="{{ isset($record->name) ? $record->name : '' }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" autocomplete="off" name="email"
                value="{{ isset($record->email) ? $record->email : '' }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
            @if (isset($record->email))
                placeholder="Không đổi password thì không nhập thông tin vào ô textbox này"
            @else
                required
            @endif>
        </div>
        <button type="submit" class="btn btn-outline-danger">Submit</button> {{ csrf_field() }}
    </form>
</section>
@endsection
