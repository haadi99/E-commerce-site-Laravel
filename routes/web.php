<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;


Route::get('/',[MyCommerceController::class,'index'])->name('home');
Route::get('/product-category',[MyCommerceController::class,'category'])->name('product-category');
Route::get('/product-detail',[MyCommerceController::class,'detail'])->name('product-detail');
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'] )->name('dashboard');
                                        //Category//
    Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
    Route::post('/category/create',[CategoryController::class,'createCategory'])->name('category.create');
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');

    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::post('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
                                     //SubCategory
    Route::get('/sub-category/add',[SubCategoryController::class,'index'])->name('sub-category.add');
    Route::post('/sub-category/create',[SubCategoryController::class,'createSubCategory'])->name('sub-category.create');
    Route::get('/sub-category/manage',[SubCategoryController::class,'manage'])->name('sub-category.manage');

    Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub-category.update');
    Route::post('/sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('sub-category.delete');

});
