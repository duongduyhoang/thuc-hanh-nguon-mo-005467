<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not found 404</title>
    <link rel="stylesheet" href="{{ asset('Css/error_404.css') }}" >
</head>
<body>
    <div class="bg-circle"></div>

    <div class="error-container">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! Trang bạn đang tìm kiếm đã bay vào hư không.</p>
        
        <a href="{{ route('homepage')}}" class="btn-home">
            Quay lại
        </a>
    </div>
</body>
</html>