<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ArticleController;

Route::get('/', [ProfileController::class, 'showHomepage'])->name('homepage');

Route::get('/homepage', [ProfileController::class, 'showHomepage'])->name('homepage');
Route::get('/article/{id}', [ProfileController::class, 'articleById'])->name('articleById');
Route::get('/article/{id}/next', [ProfileController::class, 'nextArticle'])->name('nextArticle');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admindashboard', [ProfileController::class, 'showAdminDashboard'])->name('admindashboard');

    // Categories Routes
    Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Tags Routes
    Route::get('admin/tags', [TagController::class, 'index'])->name('admin.tags');
    Route::get('admin/tags/create', [TagController::class, 'create'])->name('admin.tags.create');
    Route::post('admin/tags', [TagController::class, 'store'])->name('admin.tags.store');
    Route::get('admin/tags/{id}/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
    Route::put('admin/tags/{id}', [TagController::class, 'update'])->name('admin.tags.update');
    Route::delete('admin/tags/{id}', [TagController::class, 'destroy'])->name('admin.tags.destroy');

    
    // Articles Routes
    Route::get('admin/articles', [ArticleController::class, 'index'])->name('admin.articles');
    Route::get('admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('admin/articles/{id}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('admin/articles/{id}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('admin/articles/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

});

require __DIR__ . '/auth.php';
