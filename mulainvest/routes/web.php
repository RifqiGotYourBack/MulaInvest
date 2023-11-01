<?php

use Illuminate\Support\Facades\Route;

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

// autentikasi
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/registerAdmin', function () {
    return view('registerAdmin');
})->name('registerAdmin');




// bagian utama
Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('/berandaTamu', function () {
    return view('berandaTamu');
})->name('berandaTamu');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/investasi', function () {
    return view('investasi');
})->name('investasi');

Route::get('/aset', function () {
    return view('aset');
})->name('aset');

// profil
Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/bankAkun', function () {
    return view('bankAkun');
})->name('bankAkun');

Route::get('/topUp', function () {
    return view('topUp');
})->name('topUp');

Route::get('/gantiPassword', function () {
    return view('gantiPassword');
})->name('gantiPassword');

Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');


// admin
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/pasarUang', function () {
    return view('pasarUang');
})->name('pasarUang');

Route::get('/obligasi', function () {
    return view('obligasi');
})->name('obligasi');



Route::get('/coba', function () {
    return view('coba');
})->name('coba');


Route::get('/index', function () {
    return view('index');
});














