<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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



Route::get('/pricing',[ProductController::class,'show'])-> name('pricing');


Route::get('/add-to-cart/{id}',[HomeController::class,'addToCart'])->name('banhang.addtocart');
Route::get('/producttype/{id}',[HomeController::class,'getProductType'])-> name('getProductType');
Route::get('cart/delete', [ProductController::class, 'removecart'])->name('removecart');
Route::get('cart/checkout', [ProductController::class, 'showCheckout'])->name('checkout');

Route::get('cart/shopping-cart', [ProductController::class, 'shoppingCard'])->name('shoppingCard');

Route::get('cart/form-edit/{id}', [ProductController::class, 'edit'])->name('formEdit');

Route::get('cart/store/save/session/{id}', [ProductController::class, 'update'])->name('storeEdit');

Route::get('/delete-cart/{id}', [HomeController::class, 'deleteCart'])->name('delete-cart');


Route::get('/SignUp',[HomeController::class,'getSignUp'])->name('getSignUp');
Route::post('/SignUp',[HomeController::class,'postSignup'])->name('postSignup');

Route::get('/SignIn',[PageController::class,'getSignIn'])->name('getSignIn');
Route::post('/SignIn',[PageController::class,'PostLogin'])->name('PostLogin');  //dùng get method http thì báo lỗi

Route::get('/SignOut',[PageController::class,'getLogout'])->name('getLogout');

// -----------------đăng nhập admin--------------------------
/*------ phần quản trị ----------*/
Route::get('/admin/dangnhap',[UserController::class,'getLogin'])->name('admin.getLogin');
Route::post('/admin/dangnhap',[UserController::class,'postLogin'])->name('admin.postLogin');
Route::get('/admin/dangxuat',[UserController::class,'getLogout']);

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	
		Route::group(['prefix'=>'category'],function(){
			// admin/category/danhsach
			Route::get('danhsach',[CategoryController::class,'getCateList'])->name('admin.getCateList');
			Route::get('them',[CategoryController::class,'getCateAdd'])->name('admin.getCateAdd');
			Route::post('them',[CategoryController::class,'postCateAdd'])->name('admin.postCateAdd');
			Route::get('xoa/{id}',[CategoryController::class,'getCateDelete'])->name('admin.getCateDelete');
			Route::get('sua/{id}',[CategoryController::class,'getCateEdit'])->name('admin.getCateEdit');
			Route::post('sua/{id}',[CategoryController::class,'postCateEdit'])->name('admin.postCateEdit');
		});

		//viết tiếp các route khác cho crud products, users,.... thì viết tiếp

});

Route::get('/checkout', [HomeController::class, 'checkout']);
