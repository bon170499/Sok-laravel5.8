@extends('backend.master')
@section('content')
<section style="width:60%; margin: auto">
    <h3 class="display-3">Change img</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-2">Product</div>
            <div class="col-md-10">
                <select name="product" class="form-control">
                    @foreach ($product as $item)
                        <option
                        value="{{ $item->product_id }}"
                        @if (isset($record->img_pro_id) && $record->img_pro_id == $item->product_id)
                            selected
                        @endif>
                        {{ $item->product_name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="img">Img</label>
            <input type="file" name="img[]" multiple class="form-control-file">
        </div>
        <button type="submit" class="btn btn-outline-danger">Submit</button> {{ csrf_field() }}
    </form>
</section>
@endsection
