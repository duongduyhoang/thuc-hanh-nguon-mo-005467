@extends('homepage')

@section('noidung_chinh')

<link rel="stylesheet" href="{{ asset('Css/Login/register.css') }}">

<div class="register-container">
    <form action="{{ route('register.proccess') }}" method="POST">
        @csrf

        <h2>Đăng Ký</h2>

        <div class="input-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="input-group">
            <label for="password_confirm">Nhập lại mật khẩu</label>
            <input type="password" id="password_confirm" name="password_confirm" required>
        </div>

        <button type="submit" class="btn-register">Đăng Ký</button>

        <p class="footer-text">
            Đã có tài khoản?
            <a href="{{ route('login') }}">Đăng nhập</a>
        </p>
    </form>

    @if (isset($error))
    <div class="error-message">{{ $error }}</div>
    @endif

    @if (isset($success))
    <div class="success-message">{{ $success }}</div>
    @endif
</div>

@endsection