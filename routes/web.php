<?php

use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;

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

Route::resource('/', ProductController::class);

Route::middleware(['check.admin'])->group(function () {
    Route::resource('admin', AdminProductController::class);
    Route::post('logout', [AdminLoginController::class, "logout"])->name('logout');
});

Route::get('/login-admin', [AdminLoginController::class, 'show_admin_login_form']);
Route::post('/login-admin', [AdminLoginController::class, 'login'])->name('login');
