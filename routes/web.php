<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/about',[\App\Http\Controllers\HomeController::class,'about']);

Route::get('/register',[\App\Http\Controllers\UserController::class,'index']);
Route::post('/register',[\App\Http\Controllers\UserController::class,'store']);

Route::get('/login',[\App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::post('/auth',[\App\Http\Controllers\LoginController::class,'authentication']);
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia\Inertia::render('Dashboard');
//})->name('dashboard');
