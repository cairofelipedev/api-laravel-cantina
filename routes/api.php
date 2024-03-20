<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('products')->group(function () {
        Route::get(
            '/',
            [ProductController::class, 'index']
        );
        Route::post(
            '/',
            [ProductController::class, 'store']
        );
        Route::get(
            '/{id}',
            [ProductController::class, 'show']
        );
        Route::put(
            '/{id}',
            [ProductController::class, 'update']
        );
        Route::delete(
            '/{id}',
            [ProductController::class, 'destroy']
        );
    });

    Route::prefix('orders')->group(function () {
        Route::get(
            '/',
            [OrderController::class, 'index']
        );
        Route::post(
            '/',
            [OrderController::class, 'store']
        );
        Route::get(
            '/{id}',
            [OrderController::class, 'show']
        );
    });
});
