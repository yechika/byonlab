<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;

Route::get('/', [ProductController::class, 'index'])->name('landing');
Route::get('/products', [ProductController::class, 'productsPage'])->name('products.page');
Route::view('/about_us', 'about_us')->name('about');
Route::view('/contact_us', 'contact_us')->name('contact');

// Articles routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['id', 'en'])) {
        session(['lang' => $lang]);
    }
    return back();
})->name('lang.switch');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

