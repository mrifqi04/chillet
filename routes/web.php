<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Http\Middleware\Check;

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

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::resource('products', ProductController::class);

        Route::resource('orders', OrderController::class);
        Route::post('/confirm/{id}', [OrderController::class, 'confirmOrder'])->name('confirmOrder');
        Route::post('order/process/{id}', [OrderController::class, 'processOrder'])->name('processOrder');
        Route::post('order/send/{id}', [OrderController::class, 'sendOrder'])->name('sendOrder');
    });
});

Route::prefix('user')->group(function () {
    Route::middleware('user')->group(function () {
        Route::get('profile', [UserController::class, 'index']);
        Route::get('checkout', [CheckoutController::class, 'index']);

        Route::get('order/{id}', [UserController::class, 'showOrder'])->name('showOrder');
        Route::post('order/verify/{id}', [UserController::class, 'verifyOrder'])->name('verifyOrder');
        Route::post('order/success/{id}', [UserController::class, 'successOrder'])->name('successOrder');
    });
});

require __DIR__ . '/auth.php';
