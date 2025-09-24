<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// 🏠 Главная — список рецептов


Route::resource('categories', CategoryController::class);
Route::get('/search', [RecipeController::class, 'search'])->name('recipes.search');

// 📊 Дашборд (только авторизованные и верифицированные)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Профиль и приватные действия
Route::middleware('auth')->group(function () {
    // Профиль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Приватная часть recipes
    Route::resource('recipes', RecipeController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('/', [RecipeController::class, 'index'])->name('home');

// 📚 Публичные маршруты (index и show)
Route::resource('recipes', RecipeController::class)
    ->only(['index', 'show']);

require __DIR__.'/auth.php';
