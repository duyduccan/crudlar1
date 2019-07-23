@extends('admin.layouts.layouts')

@section("title")
    Hiển thị sản phẩm
@endsection

@section("content")
    <div class="container">
        <h2>Danh sách sản phẩm</h2>
        <p><a href="{{secure_url('admin/products/create')}}" class="btn btn-success">Thêm sản phẩm</a></p>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->images}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                       <a href="{{secure_url("admin/products/edit/".$product->id)}}" class="btn btn-primary">Sửa</a>
                       <a href="{{secure_url("admin/products/delete/".$product->id)}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection