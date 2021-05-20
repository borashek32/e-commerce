<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Auth
Auth::routes(['register' => true]);

Route::get('/login', [\App\Http\Controllers\Frontend\IndexController::class, 'loginAuth'])
    ->name('login-auth');

Route::post('/login/user', [\App\Http\Controllers\Frontend\IndexController::class, 'loginSubmit'])
    ->name('login-submit');

Route::get('/register', [\App\Http\Controllers\Frontend\IndexController::class, 'registerAuth'])
    ->name('register-auth');

Route::post('/register/user', [\App\Http\Controllers\Frontend\IndexController::class, 'registerSubmit'])
    ->name('register-submit');


// Frontend
Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index'])
    ->name('home');

Route::get('/category/{slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'category'])
    ->name('category');

Route::get('/categories', [\App\Http\Controllers\Frontend\CategoryController::class, 'categories'])
    ->name('categories');

Route::get('/new-products', [\App\Http\Controllers\Frontend\ProductController::class, 'newProducts'])
    ->name('new-products');

Route::get('/winter-products', [\App\Http\Controllers\Frontend\ProductController::class, 'winterProducts'])
    ->name('winter-products');

Route::get('/products', [\App\Http\Controllers\Frontend\ProductController::class, 'products'])
    ->name('products');

Route::get('/product/{slug}', [\App\Http\Controllers\Frontend\ProductController::class, 'product'])
    ->name('product');

Route::get('/brands', [\App\Http\Controllers\Frontend\BrandController::class, 'brands'])
    ->name('brands');

Route::get('/brand/{slug}', [\App\Http\Controllers\Frontend\BrandController::class, 'brand'])
    ->name('brand');


// Admin dashboard
Route::group(['prefix' => 'admin/', 'middleware' => ['auth', 'admin']], function () {
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

    // Coupons
    Route::resource('/coupons', \App\Http\Controllers\Admin\CouponController::class);
    Route::post('coupon_status', [\App\Http\Controllers\Admin\CouponController::class, 'couponStatus'])
        ->name('coupons.status');
});


// Seller dashboard
Route::group(['prefix' => 'vendor/', 'middleware' => ['auth', 'vendor']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'vendor'])
        ->name('seller');
});


// User dashboard
Route::group(['prefix' => 'user'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\UserController::class, 'userDashboard'])
        ->name('user.dashboard');

    Route::get('/order', [\App\Http\Controllers\User\UserController::class, 'userOrder'])
        ->name('user.order');

    Route::get('/address', [\App\Http\Controllers\User\UserController::class, 'userAddress'])
        ->name('user.address');

    Route::get('/account-details', [\App\Http\Controllers\User\UserController::class, 'userAccount'])
        ->name('user.account-details');

    Route::post('/billing/address/{id}', [\App\Http\Controllers\User\AddressController::class, 'billingAddress'])
        ->name('user.billing-address');

    Route::post('/shipping/address/{id}', [\App\Http\Controllers\User\AddressController::class, 'shippingAddress'])
        ->name('user.shipping-address');

    Route::post('/update/account/{id}', [\App\Http\Controllers\User\UserController::class, 'updateAccount'])
        ->name('account.update');


    // Cart
    Route::post('/cart/store', [\App\Http\Controllers\User\CartController::class, 'cartStore'])
        ->name('cart.store');

    Route::post('/cart/delete', [\App\Http\Controllers\User\CartController::class, 'cartDelete'])
        ->name('cart.delete');

    Route::get('/cart', [\App\Http\Controllers\User\CartController::class, 'cart'])
        ->name('cart');
});
