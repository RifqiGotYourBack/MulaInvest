<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvestmentController;

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

Route::get('/', function () {
    return view('welcome');
});

// Page Registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register-form');
// Controller Registrasi
Route::post('/register', [RegisterController::class, 'register'])->name('register-store');

// Page login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login-form');
// Controller Login
Route::post('/login', [LoginController::class, 'login'])->name('login-store');
// Controller Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// Investment (belum bikin routes)
// Page Home (User)

Route::group([
    'middleware' => 'auth',
], function () {

    Route::group([
        'middleware' => 'admin',
    ], function () {
        // Page CMS
        Route::get('/content-management-system', [AdminController::class, 'showCMS'])->name('content-management-system');

        Route::get('/investments', [InvestmentController::class, 'index'])->name('investments.index');
        Route::get('/investments/create', [InvestmentController::class, 'create'])->name('investments.create');
        Route::post('/investments', [InvestmentController::class, 'store'])->name('investments.store');
        Route::get('/investments/{investment}', [InvestmentController::class, 'show'])->name('investments.show');
        Route::get('/investments/{investment}/edit', [InvestmentController::class, 'edit'])->name('investments.edit');
        Route::put('/investments/{investment}', [InvestmentController::class, 'update'])->name('investments.update');
        Route::delete('/investments/{investment}', [InvestmentController::class, 'destroy'])->name('investments.destroy');
    });

    // Page Home

    // Page Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile-page');
    // Page Edit Profile
    Route::get('/edit-profile', [ProfileController::class, 'showEditProfileForm'])->name('edit-profile-form');
    // Controller Edit Profile
    Route::post('/edit-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');

    // Page Edit Password
    Route::get('/edit-password', [ProfileController::class, 'showEditPasswordForm'])->name('edit-password-form');
    // Controller Edit Password
    Route::post('/edit-password', [ProfileController::class, 'updatePassword'])->name('update-password');

    // Page Edit Account Bank
    Route::get('/edit-bank-account', [ProfileController::class, 'showEditBankAccount'])->name('edit-bank-account-form');

    // Controller Edit Account Bank
    Route::post('/update-bank-account', [ProfileController::class, 'updateBankAccount'])->name('update-bank-account');
});
