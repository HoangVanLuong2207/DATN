<?php

use App\Http\Controllers\admin\ContactAdminController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\DanhmucController;
use App\Http\Controllers\admin\SanphamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowsanphamController;
use Database\Seeders\SanphamSeeder;
use Faker\Guesser\Name;
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
// Route::get('/admin',[HomeController::class, 'index'])->name('home.index');
// Route::get('/admin/danhmuc',[DanhmucController::class,'index'])->name('danhmuc.index');
// Route::get('/admin/danhmuc/create',[DanhmucController::class,'create'])->name('danhmuc.create');
// Route::post('/admin/danhmuc/store',[DanhmucController::class,'store'])->name('danhmuc.store');
// Route::get('/admin/danhmuc/delete/{id}',[DanhmucController::class,'delete'])->name('danhmuc.delete');
// Route::get('/admin/danhmuc/edit/{id}',[DanhmucController::class,'edit'])->name('danhmuc.edit');
// Route::post('/admin/danhmuc/update/{id}',[DanhmucController::class,'update'])->name('danhmuc.update');

// // Sản phẩm
// Route::get('/admin/sanpham',[SanphamController::class,'index'])->name('sanpham.index');
// Route::get('/admin/sanpham/create', [SanphamController::class, 'create'])->name('sanpham.create');
// Route::post('/admin/sanpham/store', [SanphamController::class, 'store'])->name('sanpham.store');
// Route::get('/admin/sanpham/edit/{id}',[SanphamController::class, 'edit'])->name('sanpham.edit');
// Route::post('/admin/sanpham/update/{id}',[SanphamController::class, 'update'])->name('sanpham.update');
// Route::get('/admin/sanpham/delete/{id}',[SanphamController::class, 'delete'])->name('sanpham.delete');

// Client
Route::get('/',[Controller::class,'danhmuc'])->name('danhmuc.index');
Route::get('/menu', [Controller::class, 'show'])->name('client.menu');
Route::get('/menu',[Controller::class,'showsp'])->name('client.showsp');
Route::get('/product-single/{id}',[Controller::class,'ctsp'])->name('client.ctsp');



// Contact
Route::get('/contact/create',[ContactController::class,'create'])->name('contact.create');
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');
Route::get('/admin/contact',[ContactAdminController::class,'index'])->name('contact.index');
Route::get('/admin/contact/delete/{id}',[ContactAdminController::class,'delete'])->name('contact.delete');

// Search
Route::get('/search', [Controller::class, 'search'])->name('search');
