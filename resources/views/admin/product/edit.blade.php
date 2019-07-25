@extends('admin.layouts.layouts')

@section("title")
    Sửa sản phẩm
@endsection

@section("content")
    Sửa sản phẩm {{$product->id}}

    <div class="container">
        <form name="product" method="post" action="{{ secure_url("admin/products/edit/$product->id") }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>

            <div class="form-group">
                <label>Slug sản phẩm:</label>
                <input type="text" class="form-control" name="slug"  value="{{$product->slug}}">
            </div>

            <div class="form-group">
                <label>Hình ảnh sản phẩm:</label>
                <input type="text" class="form-control" name="images"  value="{{$product->images}}">
            </div>

            <div class="form-group">
                <label>Mô tả sản phẩm:</label>
                <textarea id="mytextarea" rows="4" cols="50" name="description" >
                    {{$product->description}}
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection