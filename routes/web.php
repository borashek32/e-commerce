<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::get('/home', [\App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('e-app');

Auth::routes(['register' => false]);


// Frontend
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/category/{slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'category'])
    ->name('category');

Route::get('/categories', [\App\Http\Controllers\Frontend\CategoryController::class, 'categories'])
    ->name('categories');

Route::get('/new-products', [\App\Http\Controllers\Frontend\ProductController::class, 'newProducts'])
    ->name('new-products');

Route::get('/products', [\App\Http\Controllers\Frontend\ProductController::class, 'products'])
    ->name('products');

Route::get('/product/{slug}', [\App\Http\Controllers\Frontend\ProductController::class, 'product'])
    ->name('product');

Route::get('/brands', [\App\Http\Controllers\Frontend\BrandController::class, 'brands'])
    ->name('brands');

Route::get('/brand/{slug}', [\App\Http\Controllers\Frontend\BrandController::class, 'brand'])
    ->name('brand');


// Admin dashboard
Route::group(['prefix' => 'admin/', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'admin'])
        ->name('admin');

    // Banners
    Route::resource('/banners', \App\Http\Controllers\Admin\BannerController::class);
    Route::post('banner_status', [\App\Http\Controllers\Admin\BannerController::class, 'bannerStatus'])
        ->name('banners.status');

    // Categories
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::post('category_status', [\App\Http\Controllers\Admin\CategoryController::class, 'categoryStatus'])
        ->name('categories.status');
    Route::post('/category/{id}/child', [\App\Http\Controllers\Admin\CategoryController::class, 'getChildByParentId']);

    // Brands
    Route::resource('/brands', \App\Http\Controllers\Admin\BrandController::class);
    Route::post('brand_status', [\App\Http\Controllers\Admin\BrandController::class, 'brandStatus'])
        ->name('brands.status');

    // Products
    Route::resource('/products', \App\Http\Controllers\Admin\ProductController::class);
    Route::post('product_status', [\App\Http\Controllers\Admin\ProductController::class, 'productStatus'])
        ->name('products.status');

    // Vendors
    Route::resource('/vendors', \App\Http\Controllers\Admin\VendorController::class);
});
