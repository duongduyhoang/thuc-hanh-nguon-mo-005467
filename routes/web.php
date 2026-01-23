<?php

use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Laravel\Prompts\Concerns\Fallback;

//
// use app/Http/Controllers/ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", function() {
    return view('homepage');
})->name('homepage');

Route::get('/hq', function() {
    return response()->json("Hello world");
});

// Route::get('/product', function(){

//     return view('product.prd');
// })->name('prd');

// Route::get('/product/add', function(){
//     return view('product.prd_create');
// })->name('prd_create');

// group route
Route::prefix('product')->group(function(){

//  Route::get('/', function() {
  
//     return view('product.prd');

//  })->name('prd');

//  Route::get('/add', function() {
//    return view('product.prd_create');
//  })->name('prd_create');

//  Route::get('/detail_prd/{id}', function(string $id){
//     return view('prodcut.detail_prd',['id' => $id]);
//  })->name('detail_prd');

 
//  Route::get('/',[ProductController::class,'index'])->name('prd');

//  Route::get('/detail_prd/{id}',[ProductController::class, 'GetDetail'])->name('detail_prd');

//   Route::get('/add', [ProductController::class, 'CreatProduct'])->name('prd_create');

// sử dụng group
Route::controller(ProductController::class)->group(function(){

    Route::get('/prd', 'index')->name('prd');
    Route::get('/detail_prd/{id}', 'GetDetail')->name('detail_prd');
    Route::get('/add', 'CreatProduct')->name('prd_create');

    Route::post('/store','store')->name('prd_store');
});

});

// Route::get('/product/add/{id}', function($id){
//     return view('product.prd_create', ['id' => $id]);
// })->name('prd_create');

// Route::get('/product/detail_prd/{id}', function(string $id){

//     // return "Id: $id";
//     return view('product.detail_prd', "Id: $id");
// });

// không tìm thấy route thì lỗi
Route::Fallback(function(){

    return View('Error.error_404');
});

Route::get('/profile/{name?}/{masv?}',function(string $name = "Luong Xuan Hieu ", string $masv = "123456"){
 
    return view('Sinhvien.profile',[
        "name" => $name,
        "masv" => $masv
    ]);

})->name('profile');

Route::get('/banco/{n}', function(int $n){

    return view('Banco.banco', [
        'number' => $n,
    ]);
})->name('banco');

// login

Route::get('/login', [ProductController::class, 'login'])->name('login');
Route::post('/login', [ProductController::class, 'checkLogin'])->name('login.process');

//Register

Route::get('/register', [ProductController::class, 'register'])->name('register');
Route::post('/register', [ProductController::class, 'checkRegister'])->name('register.proccess');