<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::with('category')->latest()->get();
    return view('index', ['products' => $products, 'title' => 'Home']);
})->name('home');


Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('products', ProductController::class)->middleware('auth');

require __DIR__ . '/auth.php';
