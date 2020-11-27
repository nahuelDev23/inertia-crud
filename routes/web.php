<?php

use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia\Inertia::render('Dashboard');
//})->name('dashboard');

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/about',[\App\Http\Controllers\HomeController::class,'about'])->name('about');

Route::get('/register',[\App\Http\Controllers\UserController::class,'index'])->name('register');
Route::post('/register',[\App\Http\Controllers\UserController::class,'store']);

Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::post('/auth',[\App\Http\Controllers\LoginController::class,'authentication']);
Route::get('/logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('logout');

/**
 * Terminar
 */
Route::get('forget-password', [\App\Http\Controllers\ForgotPasswordController::class,'getEmail'])->name('forget-password');
Route::post('forget-password', [\App\Http\Controllers\ForgotPasswordController::class,'postEmail']);


