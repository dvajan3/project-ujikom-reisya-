<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', [App\Http\Controllers\PageController::class, 'blog'])->name('blog');

Route::get('/blog-details/{id}', [App\Http\Controllers\PageController::class, 'blogDetails'])->name('blog-details');

Route::get('/category', [App\Http\Controllers\PageController::class, 'category'])->name('category');

Route::get('/categori', [App\Http\Controllers\PageController::class, 'categori'])->name('categori');

Route::get('/category/{id}/articles', [App\Http\Controllers\PageController::class, 'categoryArticles'])->name('category.articles');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('/elements', function () {
    return view('elements');
})->name('elements');

Route::get('/latest', [App\Http\Controllers\PageController::class, 'latest'])->name('latest');

Route::get('/latest-news', [App\Http\Controllers\PageController::class, 'latestNews'])->name('latest-news');

Route::get('/search', [App\Http\Controllers\PageController::class, 'search'])->name('search');

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/index', function () {
    return view('index');
})->name('index');

// Authentication routes
Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard');

Route::get('/admin/articles', function () {
    return view('admin.articles.index');
})->name('admin.articles.index');

Route::get('/admin/categories', function () {
    return view('admin.categories.index');
})->name('admin.categories.index');

// Role-based routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
    
    // Category management routes
    Route::get('/categories', [App\Http\Controllers\AdminCategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [App\Http\Controllers\AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [App\Http\Controllers\AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [App\Http\Controllers\AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{id}', [App\Http\Controllers\AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [App\Http\Controllers\AdminCategoryController::class, 'destroy'])->name('categories.destroy');
    
    // Article management routes
    Route::get('/articles', [App\Http\Controllers\AdminArticleController::class, 'index'])->name('articles');
    Route::get('/articles/{id}/edit', [App\Http\Controllers\AdminArticleController::class, 'edit'])->name('articles.edit');
    Route::patch('/articles/{id}', [App\Http\Controllers\AdminArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [App\Http\Controllers\AdminArticleController::class, 'destroy'])->name('articles.destroy');
    
    Route::get('/users', [App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
    Route::patch('/users/{user}/role', [App\Http\Controllers\Admin\AdminController::class, 'updateUserRole'])->name('users.role');
    Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts');
});

Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Siswa\SiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/articles/create', [App\Http\Controllers\Siswa\SiswaController::class, 'create'])->name('articles.create');
    Route::post('/articles', [App\Http\Controllers\Siswa\SiswaController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [App\Http\Controllers\Siswa\SiswaController::class, 'edit'])->name('articles.edit');
    Route::patch('/articles/{article}', [App\Http\Controllers\Siswa\SiswaController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [App\Http\Controllers\Siswa\SiswaController::class, 'destroy'])->name('articles.destroy');
    Route::get('/profile', [App\Http\Controllers\Siswa\SiswaController::class, 'profile'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\Siswa\SiswaController::class, 'updateProfile'])->name('profile.update');
});

Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Guru\GuruController::class, 'dashboard'])->name('dashboard');
    Route::get('/articles', [App\Http\Controllers\Guru\GuruController::class, 'articles'])->name('articles');
    Route::patch('/articles/{article}/review', [App\Http\Controllers\Guru\GuruController::class, 'reviewArticle'])->name('articles.review');
    Route::get('/comments', [App\Http\Controllers\Guru\GuruController::class, 'comments'])->name('comments');
    Route::patch('/comments/{comment}/review', [App\Http\Controllers\Guru\GuruController::class, 'reviewComment'])->name('comments.review');
    Route::delete('/comments/{comment}', [App\Http\Controllers\Guru\GuruController::class, 'deleteComment'])->name('comments.delete');
    Route::get('/profile', [App\Http\Controllers\Guru\GuruController::class, 'profile'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\Guru\GuruController::class, 'updateProfile'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/blog-details/{article}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
});