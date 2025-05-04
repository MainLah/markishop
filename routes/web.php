<?php

use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
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

Route::middleware(['check.auth'])->group(function () {
    Route::resource('/', ProductController::class);
});

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, "showRegisterForm"]);
Route::post('/register', [UserController::class, "register"])->name('register');

Route::middleware(['check.admin'])->group(function () {
    Route::resource('admin', AdminProductController::class);
    Route::post('admin-logout', [AdminLoginController::class, "logout"])->name('admin-logout');
});

Route::get('/login-admin', [AdminLoginController::class, 'show_admin_login_form']);
Route::post('/login-admin', [AdminLoginController::class, 'login'])->name('admin-login');
