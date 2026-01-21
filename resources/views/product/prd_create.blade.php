<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create product</title>
    <link rel="stylesheet" href="{{ asset('Css/create_prd.css')  }}"/>
</head>
<body>
   <div class="form-container">

   <h2>➕ Thêm sản phẩm mới</h2>
    
    <form action="#" method="POST">
        <div class="form-group">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" id="product_name" name="name" placeholder="Ví dụ: Táo Mỹ..." required>
        </div>

        <div class="form-group">
            <label for="product_price">Giá sản phẩm (VNĐ)</label>
            <input type="number" id="product_price" name="price" placeholder="Ví dụ: 50000" required>
        </div>

        <!-- <div class="form-group">
            <label for="product_img">Đường dẫn ảnh (URL)</label>
            <input type="text" id="product_img" name="img" placeholder="https://abc.com/image.png">
        </div> -->

        <div class="button-group">
            <button type="submit" class="btn-submit">Lưu sản phẩm</button>
            <a href="{{ route('prd')}}" class="btn-cancel">Hủy</a>
        </div>
    </form>
   </div>

 <?php 
 
  if(!isset($id) && empty($id)){
   echo" ";

  }else{
    echo "<h1>Id: {$id}</h1>";
  };
 ?>
</body>
</html>