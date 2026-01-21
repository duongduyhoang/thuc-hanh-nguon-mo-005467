<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bà cở <?php echo $number; ?>x<?php echo $number; ?></title>
    <link rel="stylesheet" href="{{ asset('Css/Banco_css/banco.css') }}">
</head>
<body>
<div class="main-container">
        <h1 class="title">Bàn cờ vua kích thước <?php echo $number; ?>x<?php echo $number; ?></h1>

        <div class="actions">
            <a href="{{ route('homepage') }}" class="btn-home">
                🏠 Quay lại Trang chủ
            </a>
        </div>

        <div class="chessboard" style="grid-template-columns: repeat(<?php echo $number; ?>, 1fr);">
            <?php 
            for ($row = 1; $row <= $number; $row++) {
                for ($col = 1; $col <= $number; $col++) {
                    $colorClass = (($row + $col) % 2 == 0) ? 'white' : 'black';
                    echo "<div class='cell $colorClass'></div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>