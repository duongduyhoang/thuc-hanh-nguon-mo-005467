@extends('Layout.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Product/update_prd.css') }}">

<div class="container">
    <div class="form-card">
        <h2>✏️ Cập nhật sản phẩm</h2>
        <hr>
        
        <form action="{{ route('update_user_one', ['id' => $dataUser->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>name</label>
                <input type="text" name="name" class="form-control" value="{{ $dataUser->name }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $dataUser->email }}">
            </div>


            <div class="btn-group">
                <button type="submit" class="btn-save">Lưu thay đổi</button>
                <a href="{{ route('ListUser') }}" class="btn-cancel">Hủy</a>
            </div>
        </form>
    </div>
</div>

@if ($errors->any())
    <div style="background: #fee; border: 1px solid red; color: red; padding: 10px; margin-bottom: 20px;">
        <strong>Phát hiện lỗi:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection