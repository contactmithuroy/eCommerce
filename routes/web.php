<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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
    
    Route::resource('admin/product',ProductController::class);
    Route::delete('admin/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('admin/product/status/{id}/{status}',[ProductController::class,'status'])->name('product.status');
    
    Route::resource('admin/coupon',CouponController::class);
    Route::delete('admin/coupon/delete/{id}',[CouponController::class,'delete'])->name('coupon.delete'); 
    Route::get('admin/coupon/status/{id}/{status}',[CouponController::class,'status'])->name('coupon.status');

    Route::resource('admin/size',SizeController::class);
    Route::delete('admin/size/delete/{id}',[SizeController::class,'delete'])->name('size.delete');
    Route::get('admin/size/status/{id}/{status}',[SizeController::class,'status'])->name('size.status');

    Route::resource('admin/color',ColorController::class);
    Route::delete('admin/color/delete/{id}',[ColorController::class,'delete'])->name('color.delete');
    Route::get('admin/color/status/{id}/{status}',[ColorController::class,'status'])->name('color.status');

    
});
// Route::get('/admin',[AdminController::class,'index']);
Route::get('/login',[AdminController::class,'login'])->name('login');
Route::get('logout', [AdminController::class,'logout'])->name('admin.logout');
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
// Route::get('admin/updatePassword',[AdminController::class,'updatePassword']); // for creating hash password

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
