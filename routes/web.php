<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
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

Route::group(['middleware'=>'admin_auth'],function(){
    
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::get('admin/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('admin/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('admin/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::delete('admin/category/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('admin/category/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
    Route::put('admin/category/update', [CategoryController::class,'update'])->name('category.update');
    Route::get('admin/category/status/{id}/{status}',[CategoryController::class,'status'])->name('category.status');

    Route::resource('admin/coupon',CouponController::class);
    Route::get('admin/coupon/status/{id}/{status}',[CouponController::class,'status'])->name('coupon.status');
});
// Route::get('/admin',[AdminController::class,'index']);
Route::get('/login',[AdminController::class,'login'])->name('login');
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
// Route::get('admin/updatePassword',[AdminController::class,'updatePassword']); // for creating hash password
Route::get('logout', [AdminController::class,'logout'])->name('admin.logout');

Route::get('admin/edit',function(){
    return view('admin.category.edit');
});

// Route::post('/admin/category',[CategoryController::class,'store'])->name('category.store');
// Route::get('/admin/category',[CategoryController::class,'index'])->name('category.index');
// Route::get('/admin/category/create',[CategoryController::class,'create'])->name('category.create');
// Route::put('/admin/category/{category}',[CategoryController::class,'update'])->name('category.update');
// Route::get('/admin/category/{category}',[CategoryController::class,'show'])->name('category.show');
// Route::delete('/admin/category/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
// Route::get('/admin/category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');

// |                                |                  |                                                 | admin_auth |
// |        | GET|HEAD  | admin/coupon                   | coupon.index     | App\Http\Controllers\CouponController@index     | web        |
// |        |           |                                |                  |                                                 | admin_auth |
// |        | POST      | admin/coupon                   | coupon.store     | App\Http\Controllers\CouponController@store     | web        |
// |        |           |                                |                  |                                                 | admin_auth |
// |        | GET|HEAD  | admin/coupon/create            | coupon.create    | App\Http\Controllers\CouponController@create    | web        |
// |        |           |                                |                  |                                                 | admin_auth |
// |        | GET|HEAD  | admin/coupon/{coupon}          | coupon.show      | App\Http\Controllers\CouponController@show      | web        |
// |        |           |                                |                  |                                                 | admin_auth |
// |        | PUT|PATCH | admin/coupon/{coupon}          | coupon.update    | App\Http\Controllers\CouponController@update    | web        |
// |        |           |                                |                  |                                                 | admin_auth |
// |        | DELETE    | admin/coupon/{coupon}          | coupon.destroy   | App\Http\Controllers\CouponController@destroy   | web        |
// |        |           |                                |                  |                                                 | admin_auth |
// |        | GET|HEAD  | admin/coupon/{coupon}/edit     | coupon.edit      | App\Http\Controllers\CouponController@edit      | web        |
// |        |           |                                |                  |                                                 | admin_auth |
