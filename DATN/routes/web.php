<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShowsanphamController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\DanhmucController;
use App\Http\Controllers\admin\SanphamController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\admin\ContactAdminController;

// Trang chủ Client
Route::get('/', [Controller::class, 'index']);
Route::get('/', [Controller::class, 'danhmuc'])->name('danhmuc.index');
Route::get('/menu', [Controller::class, 'show'])->name('client.menu');
Route::get('/menu', [Controller::class, 'showsp'])->name('client.showsp'); // ⚠️ Lưu ý: hai route cùng '/menu'
Route::get('/product/{id}', [Controller::class, 'showProductDetail'])->name('client.product.detail');
Route::post('/add-to-cart/{id}', [Controller::class, 'addToCart'])->name('cart.add');

// Search
Route::get('/search', [Controller::class, 'search'])->name('search');

// Liên hệ từ Client
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Group Admin Route
Route::prefix('admin')->group(function () {
    // Trang chủ Admin
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // Danh mục
    Route::prefix('danhmuc')->group(function () {
        Route::get('/', [DanhmucController::class, 'index'])->name('danhmuc.index');
        Route::get('/create', [DanhmucController::class, 'create'])->name('danhmuc.create');
        Route::post('/store', [DanhmucController::class, 'store'])->name('danhmuc.store');
        Route::get('/edit/{id}', [DanhmucController::class, 'edit'])->name('danhmuc.edit');
        Route::post('/update/{id}', [DanhmucController::class, 'update'])->name('danhmuc.update');
        Route::get('/delete/{id}', [DanhmucController::class, 'delete'])->name('danhmuc.delete');
    });

    // Sản phẩm
    Route::prefix('sanpham')->group(function () {
        Route::get('/', [SanphamController::class, 'index'])->name('sanpham.index');
        Route::get('/create', [SanphamController::class, 'create'])->name('sanpham.create');
        Route::post('/store', [SanphamController::class, 'store'])->name('sanpham.store');
        Route::get('/edit/{id}', [SanphamController::class, 'edit'])->name('sanpham.edit');
        Route::post('/update/{id}', [SanphamController::class, 'update'])->name('sanpham.update');
        Route::get('/delete/{id}', [SanphamController::class, 'delete'])->name('sanpham.delete');
    });

    // Ảnh sản phẩm (biến thể)
    Route::prefix('product-images')->group(function () {
        Route::get('/index', [ProductImageController::class, 'index'])->name('product-images.index');
        Route::get('/create', [ProductImageController::class, 'create'])->name('product-images.create');
        Route::post('/', [ProductImageController::class, 'store'])->name('product-images.store');
    });

    // Quản lý liên hệ từ Admin
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactAdminController::class, 'index'])->name('contact.index');
        Route::get('/delete/{id}', [ContactAdminController::class, 'delete'])->name('contact.delete');
    });
});
