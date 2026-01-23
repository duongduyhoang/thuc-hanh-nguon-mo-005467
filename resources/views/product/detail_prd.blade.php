<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail product</title>
    <link rel="stylesheet" href="{{ asset('Css/Product/detail_prd.css')  }}"/>

</head>
<body>
    @extends('homepage')

@section('noidung_chinh')

<div class="detail-container">
    <div class="detail-card">
        <!-- <div class="product-image">
            <img src="https://via.placeholder.com/400" alt="Product Image">
        </div> -->

        <div class="product-details">
            <nav class="breadcrumb">
                <a href="{{ route('prd') }}">Sản phẩm</a> / Chi tiết
            </nav>
            
            <h1 class="product-title">{{ $prd_detail['name'] }}</h1>
            <p class="product-price">{{ $prd_detail['price']}} VNĐ</p>
            
            <div class="product-description">
                <h3>Mô tả sản phẩm</h3>
                <p>Đây là mô tả chi tiết cho sản phẩm có mã số {{ $prd_detail['id'] }}. Sản phẩm chất lượng cao, bảo hành chính hãng và hỗ trợ trả góp 0%.</p>
            </div>

            <div class="action-buttons">
                <button class="btn-buy">Mua ngay</button>
                <a href="{{ route('prd') }}" class="btn-back">Quay lại danh sách</a>
            </div>
        </div>
    </div>
</div>

@endsection
</body>
</html>