<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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
    Route::get('admin/add-category',[CategoryController::class,'create'])->name('category.add');

});
// Route::get('/admin',[AdminController::class,'index']);
Route::get('/login',[AdminController::class,'login']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');


