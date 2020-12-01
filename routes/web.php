<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\VistasController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\CommentsController;
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return Inertia\Inertia::render('Dashboard');
//})->name('dashboard');

Route::get('/',[HomeController::class,'index'])->name('home');
//Route::get('/about',[HomeController::class,'about'])->name('about')->middleware('verified');

Route::get('layout',[VistasController::class,'layout'])->name('layout');
Route::resource('post',PostController::class);

Route::post('comment/store',[CommentsController::class,'store'])->name('comment.store');
//Route::get('post/ver/{post}',[PostController::class,'show'])->name('post.show');
//Route::post('post',[PostController::class,'store'])->name('post.store');


Route::get('General',[VistasController::class,'general'])->name('General');
Route::get('Sexualidad',[VistasController::class,'sexualidad'])->name('Sexualidad');
Route::get('Consejos',[VistasController::class,'consejos'])->name('Consejos');
Route::get('Videojuegos',[VistasController::class,'videojuegos'])->name('Videojuegos');
Route::get('Series',[VistasController::class,'series'])->name('Series');
Route::get('Paranormal',[VistasController::class,'paranormal'])->name('Paranormal');
Route::get('Musica',[VistasController::class,'musica'])->name('Musica');
Route::get('Gastronomia',[VistasController::class,'gastronomia'])->name('Gastronomia');
Route::get('Noticias',[VistasController::class,'noticias'])->name('Noticias');
Route::get('Politica',[VistasController::class,'politica'])->name('Politica');
Route::get('Informatica',[VistasController::class,'informatica'])->name('Informatica');
Route::get('LGBTQ+',[VistasController::class,'lgbtq'])->name('LGBTQ+');




