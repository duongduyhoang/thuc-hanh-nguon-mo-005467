<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Products;
use App\Http\Controllers\Testcontroller;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->name('login.process');

//Register

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'checkRegister'])->name('register.proccess');


//logout
Route::get('/logout', [ProductController::class, 'Logout'])->name('logout');



// Middle tổng 

Route::middleware('checkuser')->group(function () {
    Route::get("/", function () {
        return view('homepage');
    })->name('homepage');

    // group route
    Route::prefix('product')->group(function () {
        // sử dụng group
        // Route::controller(ProductController::class)->group(function () {
        Route::controller(Products::class)->group(function () {

            Route::get('/prd', 'index')->name('prd');
            Route::get('/detail_prd/{id}', 'show')->name('detail_prd');
            Route::get('/edit_prd/{id}', 'edit')->name('edit_prd');
            Route::put('/update_prd/{id}', 'update')->name('update_prd_one');
            Route::get('/add', 'create')->name('prd_create');
            Route::post('/add/store', 'store')->name('store_prd');
            Route::delete('/delete/{id}', 'destroy')->name('delete_prd');
        });
    });

    Route::prefix('Category')->group(function () {

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/listcategory', 'index')->name('category_index');
            Route::get('/CreateCategory', 'create')->name('C_category');
            Route::post('/Addcategory','store')->name('store_category');
            Route::delete('/delete/{id}', 'destroy')->name('DeleteCategory');
            Route::get('/GetEditCategory/{id}', 'edit')->name('getOneCategory');
            Route::put('/UpdateCategory/{id}','update')->name('Update_category');
        });
    });

    //group user
    Route::prefix('Users')->group(function () {

        Route::controller(UserController::class)->group(function () {
            Route::get('/getallUser', 'index')->name('ListUser');
            Route::delete('/delete/{id}', 'destroy')->name('deleteUser');
            Route::get('/GetAddUser', 'create')->name('getAdd');
            Route::get('/GetEditUser/{id}', 'edit')->name('getOneUser');
            Route::put('/EditUser/{id}', 'update')->name('update_user_one');
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

Route::get('/admin', [Products::class, 'index'])->name('admin');
