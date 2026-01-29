<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcom from Laravel</title>
    <link rel="stylesheet" href="{{ asset('Css/Navbar/navbar.css') }}" >
</head>
<body>
    
<nav class="navbar">
    <div class="nav-container">
        <a href="/" class="nav-logo">Laravel</a>
        
        <ul class="nav-links">
            
    @if(session()->has('is_adult'))
        {{-- ĐÃ LOGIN --}}
        <li><a href="{{ route('prd') }}" class="{{ request()->is('product*') ? 'active' : '' }}">Product</a></li>
            <li><a href="{{ route('profile') }}" class="{{ request()->is('profile*') ? 'active' : '' }}">Sinh Viên</a></li>
        <li>
            <a href="{{ route('logout') }}">Logout</a>
        </li>
    @else
        {{-- CHƯA LOGIN --}}
        
        <li>
            <a href="{{ route('login') }}"
               class="{{ request()->is('login*') ? 'active' : '' }}">
                Login
            </a>
        </li>
    @endif

        </ul>
        <!-- <div class="nav-auth">
            <a href="#" class="btn-contact">Liên hệ</a>
        </div> -->
    </div>
</nav>

<div class="main-content">
    @yield('noidung_chinh') 
</div>
</body>
</html>