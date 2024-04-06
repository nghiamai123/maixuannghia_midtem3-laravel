<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('homepage');
// });

// Route::resource('/shop',ProductController::class);

Route::get('/shop/{id}',[ProductController::class,'show'])-> name('product.detail');

Route::get('/',[ProductController::class,'index'])-> name('homepage');

// Route::get('/signup', [UserController::class, 'signup'])->name('signup');

// Route::get('/login', [UserController::class, 'login'])->name('login');



Route::get('/pricing',[ProductController::class,'showPricing'])-> name('pricing');

Route::get('/checkout',[ProductController::class,'checkout'])-> name('checkout');

//để liên kết với nút hình Giỏ hàng để thêm sản phẩm vào giỏ hàng
Route::get('/add-to-cart/{id}',[HomeController::class,'addToCart'])->name('banhang.addtocart');

Route::get('/producttype/{id}',[HomeController::class,'getProductType'])-> name('getProductType');