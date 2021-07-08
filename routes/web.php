<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductAttController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AutocompliteController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeBannerController;

//-----Frontend Controller----------------------------
use App\Http\Controllers\Front\FrontController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// -----Frond End Route---------------------------------------------------------
Route::get('/',[FrontController::class,'index']);
Route::get('product/{slug}',[FrontController::class,'product'])->name('product.detail');
Route::post('add_to_cart',[FrontController::class,'add_to_cart'])->name('add_to_cart.post');
Route::get('demo',[FrontController::class,'add_to_cart']);
Route::get('cart',[FrontController::class,'cart'])->name('cart.post');
Route::post('cart/delete-item',[FrontController::class,'delete_item'])->name('item.delete');
// --------------------------------------------------------------

Route::group(['middleware'=>'admin_auth'],function(){
    
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    Route::get('admin/category',[CategoryController::class,'index'])->name('category.index');
    Route::get('admin/category/child',[CategoryController::class,'childCategory'])->name('category.child');
    Route::get('admin/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('admin/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::delete('admin/category/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('admin/category/edit/{category}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('admin/category/update', [CategoryController::class,'update'])->name('category.update');
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

    Route::resource('admin/brand',BrandController::class);
    Route::POST('admin/brand/{brand}',[BrandController::class,'update'])->name('brand.update');
    Route::get('admin/brand/status/{id}/{status}',[BrandController::class,'status'])->name('brand.status');
    Route::get('admin/brand/delete/{id}',[BrandController::class,'destroy'])->name('brand.delete');

    Route::resource('admin/tax',TaxController::class);
    Route::get('admin/tax/delete/{id}',[TaxController::class,'delete'])->name('tax.delete');
    Route::get('admin/tax/status/{id}/{status}',[TaxController::class,'status'])->name('tax.status');


    Route::POST('admin/brand/{brand}',[HomeBannerController::class,'update'])->name('homeBanner.update');
    Route::resource('admin/banner',HomeBannerController::class);
    Route::get('admin/banner/delete/{id}',[HomeBannerController::class,'delete'])->name('banner.delete');
    Route::get('admin/banner/status/{id}/{status}',[HomeBannerController::class,'status'])->name('banner.status');
    

    Route::get('admin/customer/status/{id}/{status}',[CustomerController::class,'status'])->name('customer.status');
    Route::get('admin/customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer.delete');
    Route::resource('admin/customer',CustomerController::class);
    


    Route::resource('admin/product_attribute',ProductAttController::class);
    Route::get('admin/product_attribute',[ProductAttController::class,'index'])->name('attribute.index');
    Route::delete('admin/product_attribute/delete/{id}',[ProductAttController::class,'delete'])->name('attribute.delete');
    Route::get('admin/product_attribute/edit/{id}',[ProductAttController::class,'edit'])->name('attribute.edit');
    // Route::post('admin/product_attribute/update/{id}',[ProductAttController::class,'update'])->name('attribute.update');
    Route::post('admin/product_attribute/update', [ProductAttController::class,'update'])->name('attribute.update');
    Route::get('admin/product_attribute/status/{id}/{status}',[ProductAttController::class,'status'])->name('attribute.status');



    // Route::post('/admin/category',[ProductAttributeController::class,'store'])->name('productAttribute.store');
    // Route::get('/admin/product_attribute',[ProductAttributeController::class,'index'])->name('product_attribute.index');
    // Route::get('/admin/product_attribute/create',[ProductAttributeController::class,'create'])->name('product_attribute.create');
    // Route::put('/admin/category/{category}',[ProductAttributeController::class,'update'])->name('productAttribute.update');
    // Route::get('/admin/category/{category}',[ProductAttributeController::class,'show'])->name('productAttribute.show');
    // Route::delete('/admin/category/{category}',[ProductAttributeController::class,'destroy'])->name('productAttribute.destroy');
    // Route::get('/admin/category/{category}/edit',[ProductAttributeController::class,'edit'])->name('productAttribute.edit');
    // Route::delete('admin/product/delete/{id}',[ProductAttributeController::class,'delete'])->name('productAttribute.delete');
    // Route::get('admin/product/status/{id}/{status}',[ProductAttributeController::class,'status'])->name('productAttribute.status');

    Route::get('/admin/search',[AutocompliteController::class,'index']);
    Route::post('/admin/search',[AutocompliteController::class,'create'])->name('category.search');




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
