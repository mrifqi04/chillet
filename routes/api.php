<?php

use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [UserController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product}', [ProductController::class, 'show']);

Route::middleware('auth:api')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('cart', [CartController::class, 'index']);
    Route::post('add/cart/{product}', [CartController::class, 'addCart']);
    Route::post('remove/cart/{product}', [CartController::class, 'removeCart']);

    Route::post('checkout', [CheckoutController::class, 'store']);

    Route::get('user/order/{id}', [UserController::class, 'showOrder']);
    Route::post('/user/order/verify/{id}', [UserController::class, 'verifyPayment']);
    Route::post('/user/success/{id}', [UserController::class, 'successOrder']);

    Route::get('orders', [UserController::class, 'orders']);
    Route::get('invoice/{id}', [UserController::class, 'invoice']);

});
