@extends('homepage')

@section('noidung_chinh')

<link rel="stylesheet" href="{{ asset('Css/Login/login.css') }}">


<div class="login-container">
    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <h2>Đăng Nhập</h2>

        <div class="input-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="input-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn-login">Đăng Ký</button>
        <p class="footer-text">
            Đã có tài khoản?
            <a href="{{ route('register') }}">Đăng Ký</a>
        </p>
        <!-- @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif -->
        @if (isset($error))
        <div class="error-message">{{ $error }}</div>
        @endif

        @if (isset($success))
        <div class="success-message">{{ $success }}</div>
        @endif

    </form>
</div>

@endsection