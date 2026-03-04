@extends('Layout.admin')

@section('content')  

<div class="container">

<h2>Thêm danh mục</h2>

@if ($errors->any())
    <div style="color:red">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('store_category') }}" method="POST">
    @csrf

    <div>
        <label>Tên danh mục</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        <label>Mô tả</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <div>
        <label>Danh mục cha</label>
        <select name="parent_id">
            <option value="">-- Không có --</option>
            @foreach($categories as $cate)
                <option value="{{ $cate->id }}"
                    {{ old('parent_id') == $cate->id ? 'selected' : '' }}>
                    {{ $cate->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Trạng thái</label>
        <select name="is_active">
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>

    <button type="submit">Thêm mới</button>
</form>

</div>
@endsection