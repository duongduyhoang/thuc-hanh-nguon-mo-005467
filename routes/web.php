<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Laravel\Prompts\Concerns\Fallback;

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

 Route::get('/', function() {
  
    return view('product.prd');

 })->name('prd');

 Route::get('/add', function() {
   return view('product.prd_create');
 })->name('prd_create');

 Route::get('/detail_prd/{id}', function(string $id){
    return view('prodcut.detail_prd',['id' => $id]);
 })->name('detail_prd');

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
