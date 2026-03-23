@extends('Layout.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Product/prd.css') }}">

<div class="container">
    <div class="header">
        <h1>📦 Danh sách sản phẩm</h1>
        <a href="{{ route('prd_create') }}" class="btn-add">+ Thêm sản phẩm mới</a>
    </div>

    <div class="filter-bar" style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
        <span style="font-weight: bold;">Lọc theo Thương hiệu:</span>
        <form action="{{ route('prd') }}" method="GET" id="filterForm">
            <select name="category_id" class="form-control" onchange="document.getElementById('filterForm').submit()" 
                style="padding: 8px 15px; border-radius: 5px; border: 1px solid #ccc; min-width: 200px;">
                <option value="">-- Tất cả thương hiệu --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </form>
        @if(request('category_id'))
            <a href="{{ route('prd') }}" style="color: #666; font-size: 14px; text-decoration: none;">❌ Bỏ lọc</a>
        @endif
    </div>

    <div class="product-grid">
        @forelse($products as $prd)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $prd->image) }}" alt="{{ $prd->name }}">
                </div>
                <div class="product-info">
                    <span class="category-badge">{{ $prd->category->name ?? 'No Brand' }}</span>
                    <h3>{{ $prd->name }}</h3>
                    <div class="price">{{ number_format($prd->price) }} VNĐ</div>
                    <div class="stock" style="font-size: 0.9rem; color: #777;">Kho: {{ $prd->stock }}</div>
                    
                    <div class="actions" style="margin-top: 15px; display: flex; gap: 10px; border-top: 1px solid #eee; padding-top: 10px;">
                        <a href="{{ route('detail_prd', ['id' => $prd->id]) }}" title="Chi tiết" style="color: #007bff; text-decoration: none;">👁️</a>
                        
                        <a href="{{ route('edit_prd', ['id' => $prd->id]) }}" title="Chỉnh sửa" style="color: #28a745; text-decoration: none;">✏️</a>
                        
                        <form action="{{ route('delete_prd', ['id' => $prd->id]) }}" method="POST" 
                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; padding: 0;" title="Xóa">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 50px; color: #999;">
                <p>Không tìm thấy sản phẩm nào.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection