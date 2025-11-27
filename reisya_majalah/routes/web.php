<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/category', [PageController::class, 'category'])->name('category');
Route::get('/latest-news', [PageController::class, 'latestNews'])->name('latest-news');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog-details/{id?}', [PageController::class, 'blogDetails'])->name('blog-details');
Route::get('/elements', [PageController::class, 'elements'])->name('elements');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactStore'])->name('contact.store');
