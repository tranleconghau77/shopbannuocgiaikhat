<?php

use App\Http\Controllers\AdminController;

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
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;


use Illuminate\Support\Facades\Route;

//Backend UI
//Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout-admin', [AdminController::class, 'log_out']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::get('/edit-category-product/{category_id}', [CategoryProduct::class, 'edit_category_product']);
Route::post('/update-category-product/{category_id}', [CategoryProduct::class, 'update_category_product']);
Route::get('/delete-category-product/{category_id}', [CategoryProduct::class, 'delete_category_product']);

//Display category product
Route::get('/active-category-status/{category_id}', [CategoryProduct::class, 'active_category_status']);
Route::get('/unactive-category-status/{category_id}', [CategoryProduct::class, 'unactive_category_status']);

//Brand product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::get('/edit-brand-product/{brand_id}',[BrandProduct::class, 'edit_brand_product']);
Route::post('/update-brand-product/{brand_id}',[BrandProduct::class, 'update_brand_product']);
Route::get('/delete-brand-product/{brand_id}', [BrandProduct::class, 'delete_brand_product']);

//Display brand product
Route::get('/active-brand-status/{brand_id}', [BrandProduct::class, 'active_brand_status']);
Route::get('/unactive-brand-status/{brand_id}', [BrandProduct::class, 'unactive_brand_status']);


//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::get('/edit-product/{product_id}',[ProductController::class, 'edit_product']);
Route::post('/update-product/{product_id}',[ProductController::class, 'update_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);

//Display product
Route::get('/active-product-status/{product_id}', [ProductController::class, 'active_product_status']);
Route::get('/unactive-product-status/{product_id}', [ProductController::class, 'unactive_product_status']);

//Manager Order
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{order_id}', [OrderController::class, 'view_order']);
Route::get('/delete-order/{order_id}', [OrderController::class, 'delete_order']);


//End BE UI


//Front-end UI
//Home page

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/category-product-home/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/brand-product-home/{brand_id}', [BrandProduct::class, 'show_brand_home']);

//Product 
//Details product
Route::get('/product-details/{product_id}', [ProductController::class, 'product_details']);
//Search product
Route::post('/search-product', [ProductController::class, 'search_product']);


//Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-cart-product/{session_id}', [CartController::class, 'delete_cart_product']);
//add cart ajax
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);

Route::get('/login',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/register',[AuthController::class, 'register']);
Route::post('/save-login',[AuthController::class, 'save_login']);
Route::post('/save-customer',[AuthController::class,'save_customer']);

//check out
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::get('/payment',[CheckoutController::class,'payment']);
Route::post('/order-place',[CheckoutController::class,'order_place']);
Route::post('/save-shipping-information',[CheckoutController::class,'save_shipping_information']);

//History
Route::get('/history',[HistoryController::class,'show_history']);