@extends('Layout.admin')

@section('content')  

<h2>Sửa danh mục</h2>

{{-- Hiển thị lỗi nếu có --}}
@if ($errors->any())
    <div style="color:red">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('Update_category',['id' => $category->id]) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Tên danh mục --}}
    <div>
        <label>Tên danh mục</label>
        <input type="text"
               name="name"
               value="{{ old('name', $category->name) }}">
    </div>

    {{-- Mô tả --}}
    <div>
        <label>Mô tả</label>
        <textarea name="description">{{ old('description', $category->description) }}</textarea>
    </div>

    {{-- Danh mục cha --}}
    <div>
        <label>Danh mục cha</label>
        <select name="parent_id">
            <option value="">-- Không có --</option>

            @foreach($categories as $cate)
                <option value="{{ $cate->id }}"
                    {{ old('parent_id', $category->parent_id) == $cate->id ? 'selected' : '' }}>
                    {{ $cate->name }}
                </option>
            @endforeach

        </select>
    </div>

    {{-- Trạng thái --}}
    <div>
        <label>Trạng thái</label>
        <select name="is_active">
            <option value="1"
                {{ old('is_active', $category->is_active) == 1 ? 'selected' : '' }}>
                Hiển thị
            </option>

            <option value="0"
                {{ old('is_active', $category->is_active) == 0 ? 'selected' : '' }}>
                Ẩn
            </option>
        </select>
    </div>

    <button type="submit">Cập nhật</button>
</form>

@endsection