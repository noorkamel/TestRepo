<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('Pages.home');
})->middleware('auth')->name('home');





Route::get('/logout', function () {

       Auth::logout();
       return  redirect()->route('login');

})->middleware('auth')->name('web.logout');


Route::middleware('auth')->group(function () {

    // Category
    Route::get('/categories', [CategoryController::class , 'view_Category'])->name('page_category');
    Route::delete('/categories/delete/{id}', [CategoryController::class , 'destroy'])->name('delete_category');
    Route::get('/categories/create', [CategoryController::class , 'create'])->name('create_catrgory');
    Route::post('/catrgory/store', [CategoryController::class , 'store'])->name('store_catrgory');



    // مسارات المنتج CRUD
    Route::get('/products', [ProductController::class , 'view_products'])->name('page_products');



    Route::get('/products/create', [ProductController::class , 'create'])->name('create_product');
    Route::post('/products/store', [ProductController::class , 'store'])->name('store_product');
    Route::delete('/products/delete/{id}', [ProductController::class , 'destroy'])->name('delete_product');
    Route::post('/products/edit/{id}', [ProductController::class , 'edit'])->name('edit_product');
    Route::post('/products/update', [ProductController::class , 'update'])->name('update_product');

     // الفواتير CRUD
     Route::get('/orders', [OrderController::class , 'view_orders'])->name('page_orders');
     Route::delete('/orders/delete/{id}', [OrderController::class , 'destroy'])->name('delete_order');


    // الزبائن
    Route::get('/customers', [CustomerController::class , 'view_customer'])->name('page_customer');

});

require __DIR__.'/auth.php';
