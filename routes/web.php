<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('landing');
Route::get('/products', [ProductController::class, 'productsPage'])->name('products.page');
Route::view('/about_us', 'about_us')->name('about');
Route::view('/contact_us', 'contact_us')->name('contact');
Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['id', 'en'])) {
        session(['lang' => $lang]);
    }
    return back();
})->name('lang.switch');

