@extends('backend.master')
@section('content')
<style>
    .row {
        margin-bottom: 1rem;
    }
</style>
<section style="width:80%; margin: auto">
    <h3 class="display-3">Add edit Product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-2"><label for="inputName">Name</label></div>
            <div class="col-md-10">
                <input type="text" class="form-control" id="inputName" placeholder="Enter Fullname" require autocomplete="off" name="name"
            value="{{ isset($record->product_name) ? $record->product_name : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"><label for="inputPrice">Price</label></div>
            <div class="col-md-10">
                <input type="number" class="form-control" id="inputPrice" placeholder="Enter Price" autocomplete="off" name="price"
                value="{{ isset($record->product_price) ? $record->product_price : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Hot</div>
            <div class="col-md-10">
                <input type="checkbox" name="hot"
                @if (isset($record->product_hot) ? $record->product_hot : 0)
                    checked
                @endif>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Sale</div>
            <div class="col-md-10">
                <input type="checkbox" name="sale"
                @if (isset($record->product_sale) ? $record->product_sale : 0)
                    checked
                @endif>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Sale Up</div>
            <div class="col-md-4">
                <input type="number" name="upto" min="0" max="100" class="form-control"
            value="{{ isset($record->product_upto) ? $record->product_upto : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Category</div>
            <div class="col-md-10">
                <select name="category" class="form-control">
                    @foreach ($category as $item)
                        <option
                        value="{{ $item->category_id }}"
                        @if (isset($record->product_fk_id) && $record->product_fk_id == $item->category_id)
                            selected
                        @endif>
                        {{ $item->category_name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Album</div>
            <div class="col-md-10">
                <select name="album" class="form-control">
                    @foreach ($album as $item)
                        <option
                        value="{{ $item->album_id }}"
                        @if (isset($record->product_ab_id) && $record->product_ab_id == $item->album_id)
                            selected
                        @endif>
                        {{ $item->album_name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Description</div>
            <div class="col-md-10">
                <textarea name="desc" class="form-control" style="height:250px;">
                    {{ isset($record->product_desc) ? $record->product_desc : '' }}
                </textarea>
                <script type="text/javascript">
                    CKEDITOR.replace("desc");
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Img</div>
            <div class="col-md-10">
                <input type="file" name="img" class="form-control-file">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-danger">Submit</button>
        <button type="button" class="btn btn-outline-dark" onclick="history.go(-1);">Back</button>
        {{ csrf_field() }}
    </form>
</section>
@endsection
