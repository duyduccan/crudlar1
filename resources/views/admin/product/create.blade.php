@extends('admin.layouts.layouts')

@section("title")
    Tạo mới sản phẩm
@endsection

@section("content")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <form name="product" method="post" action="{{ url("admin/products") }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label>Slug sản phẩm:</label>
                <input type="text" class="form-control" name="slug">
            </div>

            <div class="form-group">
                <label>Hình ảnh sản phẩm:</label>
                <input type="text" class="form-control" name="images">
            </div>

            <div class="form-group">
                <label>Mô tả sản phẩm:</label>
                <input type="text" class="form-control" name="description">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection