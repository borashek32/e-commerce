<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin dashboard
Route::group(['prefix' => 'admin/', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'admin'])
        ->name('admin');

    // Banners
    Route::resource('/banners', \App\Http\Controllers\Admin\BannerController::class);
    Route::post('banner_status', [\App\Http\Controllers\Admin\BannerController::class, 'bannerStatus'])
        ->name('banners.status');

    // Category
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::post('category_status', [\App\Http\Controllers\Admin\CategoryController::class, 'categoryStatus'])
        ->name('categories.status');

});
