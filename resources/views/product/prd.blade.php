<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('Css/prd.css') }}">
</head>

<body>

@extends('homepage')

@section('noidung_chinh')
    <div class="container">
        <div class="header">
            <h1>📦 Danh sách sản phẩm</h1>
            <a href="{{ route('prd_create') }}" class="btn-add">+ Thêm sản phẩm mới</a>
        </div>

            <div class="product-grid">
        <?php
        // data test
        $productTesst = [
            ["id" => 1, "name" => "Bo", "price" => "900.000"],
            ["id" => 1, "name" => "Dua Hau", "price" => "27300.000"],
            ["id" => 1, "name" => "Ga", "price" => "300.000"],
            ["id" => 1, "name" => "Kem", "price" => "700.000"],
            ["id" => 1, "name" => "Vit", "price" => "20.000"],
            ["id" => 1, "name" => "Cam", "price" => "1000.000"],
        ];

        foreach($productTesst as $prd):
        ?>
        <div class="product-card">
                <div class="product-info">
                    <h3>{{ $prd['name'] }}</h3>
                    <div class="price">{{ $prd['price'] }}</div>
                    <a href="#" class="btn-detail">Xem chi tiết</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    </div>
@endsection
</body>

</html>