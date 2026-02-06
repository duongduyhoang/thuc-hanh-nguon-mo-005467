@extends('Layout.admin')

@section('content')
<div class="container">
    <div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1>📦 Danh sách sản phẩm</h1>
        <a href="{{ route('prd_create') }}" class="btn-add" style="background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
            + Thêm sản phẩm mới
        </a>
    </div>

    <div class="product-grid">
        @forelse($products as $prd)
        <div class="product-card" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 8px;">
            <div class="product-info">
                <h3>{{ $prd->name }}</h3>
                <div class="price">Giá: <strong>{{ number_format($prd->price) }}</strong> VNĐ</div>
                <div class="stock">Kho: {{ $prd->stock }}</div>

                <div class="actions" style="margin-top: 15px;">
                    <a href="{{ route('detail_prd', ['id' => $prd->id]) }}" class="btn-detail" style="color: #007bff; margin-right: 15px;">
                        Xem chi tiết
                    </a>
                    <a href="{{ route('edit_prd', ['id' => $prd->id]) }}" class="btn-detail" style="color:rgb(0, 228, 27); margin-right: 15px;">
                     Update
                    </a>
                    <form action="{{ route('delete_prd', ['id' => $prd->id]) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; padding: 0;">
                            🗑️ Xóa
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p>Hiện chưa có sản phẩm nào trong hệ thống.</p>
        @endforelse
    </div>
</div>
@endsection