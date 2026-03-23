@extends('Layout.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Product/update_prd.css') }}">

<div class="container">
    <div class="form-card">
        <h2>✏️ Cập nhật sản phẩm</h2>
        <hr>
<form action="{{ route('update_prd_one', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>


    <div class="form-group">
        <label>Hình ảnh sản phẩm</label>
        @if($product->image)
            <div style="margin-bottom: 10px;">
                <p><small>Ảnh hiện tại:</small></p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh cũ" width="100" style="border-radius: 5px; border: 1px solid #ddd;">
            </div>
        @endif
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>

    <div class="form-group">
        <label>Giá (VNĐ)</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
    </div>

    <div class="form-group">
        <label>Số lượng kho</label>
        <input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
    </div>

    <div class="btn-group">
        <button type="submit" class="btn-save">Lưu thay đổi</button>
        <a href="{{ route('prd') }}" class="btn-cancel">Hủy</a>
    </div>
</form>
    </div>

</div>


@if ($errors->any())
<div style="background: #fee; border: 1px solid red; color: red; padding: 10px; margin-bottom: 20px;">
    <strong>Phát hiện lỗi:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection