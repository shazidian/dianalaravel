<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route View
Route::view('/dashboard', 'dashboard');
Route::get('/', function () {
    return view('welcome');
});
//Route Default
Route::get('/users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);

//Contoh Route Redirect
Route::get('/lama', function(){
    return "Hai! Ini Laman Web Versi 1.0";
});
Route::get('/baru', function(){
    return "Selamat! Anda berada di Laman Web Versi 2.0";
});
Route::redirect('/lama', '/baru');

//Parameter Opsional
Route::get('/user/{name?}', function ($name = 'Guest') {
    return "Halo, $name!";
});

//Route Regular Expression
Route::get('/barang/{id}', function ($id) {
    return "ID Barang: $id";
})->where('id', '[0-9]+');

//Global Constraints at app/providers/RouteServiceProvider.php
Route::get('/pesan/{id}', function ($id) {
    return "Nomor Pesanan: $id";
});

//CSRF
Route::post('/submit', function ($request) {
    return 'Form berhasil dikirim!';
});


