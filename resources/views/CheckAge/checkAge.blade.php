
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('Css/Login/CheckAge.css')}}">
</head>
<body>
    <div class="modal">
    <h2>Xác nhận độ tuổi của bạn</h2>
    <p>Nội dung này chỉ dành cho người trên 18 tuổi.</p>
    
    <form action="{{ route('checkAge.confirm') }}" method="POST">
        @csrf
        <button type="submit" name="confirm" value="yes" style="color: green;">
            Tôi đã trên 18 tuổi
        </button>
        <button type="submit" name="confirm" value="no" style="color: red;">
            Chưa, đưa tôi rời khỏi đây
        </button>
    </form>
</div>
</body>
</html>