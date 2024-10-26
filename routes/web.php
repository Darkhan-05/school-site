<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [HomeController::class, 'showPost'])->name('post.show');
Route::get('/category/{category}', [HomeController::class, 'showCategory'])->name('category.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
