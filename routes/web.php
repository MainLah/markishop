<?php

use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;

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

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/contact', [TestimonyController::class, 'create'])->name('testimony.create');
    
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'change_password'])->name('profile.change_password');
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
