<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/create_order', [OrderController::class, 'store']); // انشاء فاتورة من قبل الزبون





Route::post('register', [AuthController::class,'register']); // التجسيل لاول مرة للزبون

Route::post('login', [AuthController::class,'login']);



// تسجيل الدخول للزبون

Route::get('/products', [ProductController::class, 'index']); // استعراض الأصناف جميعها مع المنتجات في كل صنف

Route::get('/categories', [CategoryController::class, 'index']); // استعراض الأصناف جميعها مع المنتجات في كل صنف

Route::get('/products/{id}', [ProductController::class, 'show']); // استعراض منتج واحد مع تفاصيله






