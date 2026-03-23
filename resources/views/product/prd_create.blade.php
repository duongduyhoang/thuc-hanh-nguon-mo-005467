@extends('Layout.admin')

@section('content')

<h2>Thêm sản phẩm</h2>

@extends('Layout.admin')

@section('content')

<h2>Thêm sản phẩm</h2>


<form action="{{ route('store_prd') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <label>Tên sản phẩm</label><br>
    <input type="text" name="name" required><br><br>

    {{-- Thêm trường Chọn hình ảnh --}}
    <label>Hình ảnh sản phẩm</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <label>Giá</label><br>
    <input type="number" name="price" step="0.01" required><br><br>

    <label>Số lượng</label><br>
    <input type="number" name="stock" required><br><br>

    <label>Danh mục sản phẩm</label><br>
    <select name="category_id" required>
        <option value="">-- Chọn danh mục --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Lưu</button>
</form>

<a href="{{ route('prd') }}" class="btn-back">⬅️ Quay lại danh sách</a>

 <!-- <?php 
 
  if(!isset($id) && empty($id)){
   echo" ";

  }else{
    echo "<h1>Id: {$id}</h1>";
  };
 ?> -->
@endsection