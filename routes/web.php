<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin Controller
Route::middleware(['auth','admin'])->controller(AdminController::class)->group(function(){
    Route::get('admin/dashboard','index')->name('admin.index');

    Route::post('search','product_search')->name('product.search');

    Route::get('search_result','search_result')->name('search.result');

    Route::get('view_order','view_order')->name('view_order');

    Route::get('on_the_way/{id}','on_the_way')->name('on_the_way');

    Route::get('delivered/{id}','delivered')->name('delivered');

    //Route::get('pdf/{$id}','pdf')->name('pdf');

    Route::get('pdf/{id}','pdf')->name('pdf');
});

Route::middleware(['auth','admin'])->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
});

//Home Controller
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('index');

    Route::get('shop','shop')->name('shop.page');

    Route::get('add_cart/{id}','add_cart')
        ->middleware(['auth', 'verified'])
        ->name('add.cart');

    Route::get('view_cart','view_cart')
        ->middleware(['auth','verified'])
        ->name('view_cart');
    
    Route::get('product_delete/{id}','product_delete')->name('product_delete');

    Route::get('checkout','checkout')->name('checkout');

    Route::post('order','order')->name('order');

    Route::get('myorder','myorder')->name('myorder');


});




        




