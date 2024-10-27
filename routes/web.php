<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/language', function () {
    $locale = request('locale');
    if (in_array($locale, config('app.supported_locales'))) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('locale');

Route::middleware(SetLocale::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/post/{post}', [HomeController::class, 'showPost'])->name('post.show');
    Route::get('/category/{category}', [HomeController::class, 'showCategory'])->name('category.show');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {});
