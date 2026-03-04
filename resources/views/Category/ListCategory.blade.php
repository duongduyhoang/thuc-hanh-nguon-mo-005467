@extends('Layout.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('Css/Categories/ListCategory.css') }}">

<div class="container">
    <h2>Danh sách danh mục</h2>

    <a href="{{ route('C_category') }}" class="btn-add">
        <i class="fas fa-plus"></i> Thêm mới
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Danh mục cha</th>
                <th style="text-align: center;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cate)
            <tr>
                <td><strong>#{{ $cate->id }}</strong></td>
                <td>{{ $cate->name }}</td>
                <td>
                    @if($cate->parent)
                        <span class="badge-parent">{{ $cate->parent->name }}</span>
                    @else
                        <span style="color: #ccc;">Gốc</span>
                    @endif
                </td>
                <td style="text-align: center;">
                    <a href="{{ route('getOneCategory', ['id' => $cate->id]) }}">
                        Sửa
                    </a>

                    <form action="{{ route('DeleteCategory', ['id' => $cate->id]) }}"
                          method="POST" style="display:inline" 
                          onsubmit="return confirm('Xóa danh mục này sẽ ảnh hưởng đến các sản phẩm liên quan. Bạn chắc chứ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection