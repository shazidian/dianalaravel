<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
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
//Acara BKPM 3
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
//ACARA BKPM 4
    Route::prefix('seller')->group(function(){
        Route::get('/produks', function(){
            return "Ini Laman Produk dari Seller";
        });
    });
//ACARA BKPM 5
    Route::get('/pengguna', [ManagementUserController::class, 'index']);
    Route::resource('/pengguna', ManagementUserController::class);
    // Route::get('/pengguna', 'ManagementUserController');
    // Route::get("/home", function(){
    //     return view("home");
    // });
// ACARA BKPM 7
// Route::group(['namespace' => 'frontend'], function(){
//     Route::resource('homes', 'HomeController');
// });
Route::get('/homes', [HomeController::class, 'index']);
Route::resource('/homes', HomeController::class);

//ACARA BKPM 8
Route::get('/dashboards', [DashboardController::class, 'index']);
Route::resource('/dashboards', DashboardController::class);
// Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');// Route::resource('/login', LoginController::class);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rute untuk memproses data registrasi
Route::post('/register', [RegisterController::class, 'register']);