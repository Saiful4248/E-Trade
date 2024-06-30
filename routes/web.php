<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', function () {
    return view('login');
});
Route::post("/login",[UserController::class,"login"]);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get("/",[ProductController::class,"index"]);
Route::get("detail/{id}",[ProductController::class,"detail"]);
Route::get("/search",[ProductController::class,"search"]);
Route::post('/add_to_cart', [ProductController::class, 'addToCart']);
Route::get('/cartlist', [ProductController::class, 'cartlist']);
Route::post('/remove_from_cart', [ProductController::class, 'removeFromCart'])->name('remove_from_cart');
Route::get('/order', [ProductController::class, 'order'])->name('order');
Route::post('/place-order', [ProductController::class, 'placeOrder'])->name('place_order');
