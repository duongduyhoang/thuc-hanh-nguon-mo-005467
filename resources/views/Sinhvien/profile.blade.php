<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile of <?php echo $name; ?></title>
    <link rel="stylesheet" href="{{ asset('Css/profie.css') }}">
</head>
<body>

<!-- @extends('homepage')

@section('noidung_chinh') -->
    <div class="profile-card">
        <div class="avatar">
            <?php
            //  $name = request() ->route('name');
            //  $masv = request() ->route('masv');
            ?>
        </div>

        <h2><?php echo $name; ?></h2>
        <p>Sinh viên lớp Phần mềm nguồn mở nâng cao</p>

        <span class="info-label">Mã số sinh viên</span>
        <span class="info-value"><?php echo $masv; ?></span>

        <span class="info-label">Trạng thái bài tập</span>
        <span class="info-value">Đã hoàn thành</span>

        <a href="{{ route('homepage') }}" class="btn-back">Quay lại</a>
    </div>
    <!-- @endsection -->
</body>
</html>