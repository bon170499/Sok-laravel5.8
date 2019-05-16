@extends('backend.master')
@section('content')
<section style="width:60%; margin: auto">
    <h3 class="display-3">Change Category</h3>
    <form action="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter category name.." autocomplete="off"
            name="name" value="{{ isset($record->category_name) ? $record->category_name : '' }}">
        </div>
        <div class="form-group">
            <label for="">Album</label>
            <select name="album" class="form-control">
                @foreach ($album as $item)
                    <option
                    value="{{ $item->album_id }}"
                    @if (isset($record->category_ab_id) && $record->category_ab_id == $item->album_id)
                        selected
                    @endif>
                    {{ $item->album_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="nu" name="sex"
                value="0"
                @if (isset($record->category_sex) && $record->category_sex == 0)
                    checked
                @endif
                >
            <label for="nu" class="custom-control-label">Nữ</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="nam" name="sex"
                value="1"
                @if (isset($record->category_sex) && $record->category_sex == 1)
                    checked
                @endif
                >
            <label for="nam" class="custom-control-label">Nam</label>
        </div>
        <button type="submit" class="btn btn-outline-danger">Submit</button> {{ csrf_field() }}
    </form>
</section>
@endsection
