<?php

use App\Http\Controllers\admin\ContactAdminController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\DanhmucController;
use App\Http\Controllers\admin\SanphamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowsanphamController;
use App\Http\Controllers\AuthenticationController;
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
Route::group(
    [
        'namespace' => 'Backpack\CRUD\app\Http\Controllers',
        'middleware' => config('backpack.base.web_middleware', 'web'),
        'prefix' => config('backpack.base.route_prefix'),
    ],
    function () {
        // if not otherwise configured, setup the auth routes
        if (config('backpack.base.setup_auth_routes')) {
            // Authentication Routes...
            Route::get('login', 'Auth\LoginController@showLoginForm')->name('backpack.auth.login');
            Route::post('login', 'Auth\LoginController@login');
            Route::get('logout', 'Auth\LoginController@logout')->name('backpack.auth.logout');
            Route::post('logout', 'Auth\LoginController@logout');

            // Registration Routes...
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('backpack.auth.register');
            Route::post('register', 'Auth\RegisterController@register');

            // if not otherwise configured, setup the password recovery routes
            if (config('backpack.base.setup_password_recovery_routes', true)) {
                Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
                Route::post('password/reset', 'Auth\ResetPasswordController@reset');
                Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
                Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email')->middleware('backpack.throttle.password.recovery:'.config('backpack.base.password_recovery_throttle_access'));
            }

            if (config('backpack.base.setup_email_verification_routes', false)) {
                Route::get('email/verify', 'Auth\VerifyEmailController@emailVerificationRequired')->name('verification.notice');
                Route::get('email/verify/{id}/{hash}', 'Auth\VerifyEmailController@verifyEmail')->name('verification.verify');
                Route::post('email/verification-notification', 'Auth\VerifyEmailController@resendVerificationEmail')->name('verification.send');
            }
        }

        // if not otherwise configured, setup the dashboard routes
        if (config('backpack.base.setup_dashboard_routes')) {
            Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
            Route::get('/', 'AdminController@redirect')->name('backpack');
        }

        // if not otherwise configured, setup the "my account" routes
        if (config('backpack.base.setup_my_account_routes')) {
            Route::get('edit-account-info', 'MyAccountController@getAccountInfoForm')->name('backpack.account.info');
            Route::post('edit-account-info', 'MyAccountController@postAccountInfoForm')->name('backpack.account.info.store');
            Route::post('change-password', 'MyAccountController@postChangePasswordForm')->name('backpack.account.password');
        }
    });
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

Route::get('login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::post('post-login', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('register', [AuthenticationController::class, 'showRegisterForm'])->name('register');
Route::post('post-register', [AuthenticationController::class, 'postRegister'])->name('postRegister');
