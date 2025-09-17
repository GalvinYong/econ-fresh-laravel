<?php

use App\Http\Controllers\ProductCatalogController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Custom product catalog routes
Route::get('/products', [ProductCatalogController::class, 'index'])->name('products.catalog');
Route::get('/products/{id}', [ProductCatalogController::class, 'show'])->name('products.show');

// Admin routes (keep your existing ones)
// Admin routes
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);

    // Optional: Test route for Blade rendering (points to admin/products/test.blade.php)
    Route::get('/products/test', function () {
        return view('admin.products.test');
    });
});
