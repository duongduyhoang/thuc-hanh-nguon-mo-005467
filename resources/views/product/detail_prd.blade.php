@extends('Layout.admin')

@section('content')
<style>
    .detail-container { padding: 30px; background: #f4f6f9; min-height: 100vh; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .detail-card { background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); display: flex; overflow: hidden; max-width: 1000px; margin: 0 auto; }
    .product-image { flex: 1; background: #e9ecef; display: flex; align-items: center; justify-content: center; min-height: 400px; }
    .product-image img { max-width: 100%; height: auto; transition: transform 0.3s; }
    .product-image img:hover { transform: scale(1.05); }
    .product-details { flex: 1.2; padding: 40px; }
    .breadcrumb { margin-bottom: 20px; font-size: 0.9rem; color: #6c757d; }
    .breadcrumb a { color: #007bff; text-decoration: none; }
    .product-title { font-size: 2.2rem; color: #2d3436; margin-bottom: 10px; font-weight: 700; }
    .product-price { font-size: 1.8rem; color: #d63031; font-weight: bold; margin-bottom: 25px; border-bottom: 2px solid #eee; padding-bottom: 15px; }
    .product-description { margin-bottom: 30px; line-height: 1.6; color: #636e72; }
    .product-description h3 { color: #2d3436; font-size: 1.2rem; margin-bottom: 10px; }
    .info-item { margin-bottom: 10px; font-size: 1rem; }
    .info-label { font-weight: 600; color: #2d3436; width: 120px; display: inline-block; }
    .action-buttons { display: flex; gap: 15px; margin-top: 20px; }
    .btn-update { background: #ffc107; color: #212529; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: 600; transition: 0.3s; }
    .btn-update:hover { background: #e0a800; }
    .btn-back { background: #6c757d; color: white; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: 600; transition: 0.3s; }
    .btn-back:hover { background: #5a6268; }
</style>

<div class="detail-container">
    <nav class="breadcrumb">
        <a href="{{ route('prd') }}">📦 Quản lý sản phẩm</a> / <span>Chi tiết sản phẩm</span>
    </nav>

    <div class="detail-card">
        <div class="product-image">
            <img src="https://via.placeholder.com/400x400?text={{ urlencode($product['name']) }}" alt="Product Image">
        </div>

        <div class="product-details">
            <h1 class="product-title">{{ $product['name'] }}</h1>
            <p class="product-price">{{ number_format($product['price']) }} VNĐ</p>
            
            <div class="product-info-grid">
                <div class="info-item">
                    <span class="info-label">Mã sản phẩm:</span>
                    <span>#{{ $product['id'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Trạng thái:</span>
                    <span class="badge" style="background: #e1f5fe; color: #0288d1; padding: 4px 10px; border-radius: 4px; font-size: 0.8rem;">Còn hàng ({{ $product['stock'] }} SP)</span>
                </div>
            </div>

            <div class="product-description">
                <h3>Mô tả sản phẩm</h3>
                <p>Đây là sản phẩm chất lượng cao thuộc hệ thống quản lý <strong>qlbh_67pm34</strong>. Được kiểm định nghiêm ngặt, hỗ trợ bảo hành chính hãng và các dịch vụ hậu mãi đi kèm.</p>
            </div>

            <div class="action-buttons">
                <a href="{{ route('edit_prd', ['id' => $product['id']]) }}" class="btn-update">✏️ Sửa thông tin</a>
                <a href="{{ route('prd') }}" class="btn-back">⬅️ Quay lại danh sách</a>
            </div>
        </div>
    </div>
</div>  
@endsection