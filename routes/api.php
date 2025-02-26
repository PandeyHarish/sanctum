<?php

use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->post('logout', [RegisterController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/order', [OrderController::class, 'index']);
