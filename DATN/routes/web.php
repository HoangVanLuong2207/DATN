<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\DanhmucController;
use App\Http\Controllers\admin\SanphamController;
use Database\Seeders\SanphamSeeder;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[Controller::class,'index']);
// Danh mục
Route::get('/admin',[HomeController::class, 'index'])->name('home.index');
Route::get('/admin/danhmuc',[DanhmucController::class,'index'])->name('danhmuc.index');
Route::get('/admin/danhmuc/create',[DanhmucController::class,'create'])->name('danhmuc.create');
Route::post('/admin/danhmuc/store',[DanhmucController::class,'store'])->name('danhmuc.store');
Route::get('/admin/danhmuc/delete/{id}',[DanhmucController::class,'delete'])->name('danhmuc.delete');
Route::get('/admin/danhmuc/edit/{id}',[DanhmucController::class,'edit'])->name('danhmuc.edit');
Route::post('/admin/danhmuc/update/{id}',[DanhmucController::class,'update'])->name('danhmuc.update');

// Sản phẩm 
Route::get('/admin/sanpham',[SanphamController::class,'index'])->name('sanpham.index');
Route::get('/admin/sanpham/create', [SanphamController::class, 'create'])->name('sanpham.create');
Route::post('/admin/sanpham/store', [SanphamController::class, 'store'])->name('sanpham.store');
Route::get('/admin/sanpham/edit/{id}',[SanphamController::class, 'edit'])->name('sanpham.edit');
Route::post('/admin/sanpham/update/{id}',[SanphamController::class, 'update'])->name('sanpham.update');
Route::get('/admin/sanpham/delete/{id}',[SanphamController::class, 'delete'])->name('sanpham.delete');