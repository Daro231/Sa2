<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StorefrontController::class, 'index'])->name('home');
Route::get('/kids', [StorefrontController::class, 'kids'])->name('kids.index');
Route::get('/brands', [StorefrontController::class, 'brands'])->name('brands.index');

Route::view('/categories', 'categories')->name('categories.index');
Route::view('/shoes', 'layouts.shoes')->name('shoes.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
require __DIR__.'/auth.php';
