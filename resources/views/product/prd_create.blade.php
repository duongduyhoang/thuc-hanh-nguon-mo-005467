@extends('Layout.admin')

@section('content')

<h2>Thêm sản phẩm</h2>

<form action="{{ route('store_prd') }}" method="POST">

    @csrf

    <label>Tên sản phẩm</label><br>
    <input type="text" name="name"><br><br>

    <label>Giá</label><br>
    <input type="number" name="price"><br><br>

    <label>Số lượng</label><br>
    <input type="number" name="stock"><br><br>

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


 <!-- <?php 
 
  if(!isset($id) && empty($id)){
   echo" ";

  }else{
    echo "<h1>Id: {$id}</h1>";
  };
 ?> -->
@endsection