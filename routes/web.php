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
use Illuminate\Support\Facades\Route;

//Front-end UI
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);

//Backend UI
//Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'log_out']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);

//Display category product
Route::get('/active-category-status{category_id}', [CategoryProduct::class, 'active_category_status']);
Route::get('/unactive-category-status{category_id}', [CategoryProduct::class, 'unactive_category_status']);

//Update category product
Route::get('/update_category_product', [CategoryProduct::class, 'update-category-product']);

