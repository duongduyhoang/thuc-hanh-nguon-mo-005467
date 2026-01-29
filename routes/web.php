<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Testcontroller;
use App\Http\Middleware\CheckLoginUser;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Laravel\Prompts\Concerns\Fallback;




// không tìm thấy route thì lỗi
Route::Fallback(function () {

    return View('Error.error_404');
});

// login

Route::get('/login', [ProductController::class, 'login'])->name('login');
Route::post('/login', [ProductController::class, 'checkLogin'])->name('login.process');

//Register

Route::get('/register', [ProductController::class, 'register'])->name('register');
Route::post('/register', [ProductController::class, 'checkRegister'])->name('register.proccess');


//logout
Route::get('/logout', [ProductController::class, 'Logout'])->name('logout');

Route::resource('test', Testcontroller::class);


// Middle tổng 

Route::middleware('checkuser')->group(function () {
    Route::get("/", function () {
        return view('homepage');
    })->name('homepage');

    // group route
    Route::prefix('product')->group(function () {
        // sử dụng group
        Route::controller(ProductController::class)->group(function () {

            Route::get('/prd', 'index')->name('prd');
            Route::get('/detail_prd/{id}', 'GetDetail')->name('detail_prd');
            Route::get('/add', 'CreatProduct')->name('prd_create');

            Route::post('/store', 'store')->name('prd_store');
        });
    });

    // sinh vien
    Route::get('/profile/{name?}/{masv?}', function (string $name = "Luong Xuan Hieu ", string $masv = "123456") {

        return view('Sinhvien.profile', [
            "name" => $name,
            "masv" => $masv
        ]);
    })->name('profile');

    Route::get('/banco/{n}', function (int $n) {

        return view('Banco.banco', [
            'number' => $n,
        ]); 
    })->name('banco');

    // kiểm tra tuổi trước khi vào Page
    Route::get('/age', [ProductController::class, 'GetAge'])->name('checkAge');
    Route::post('/age', [ProductController::class, 'CheckAge'])->name('checkAge.confirm');
});
