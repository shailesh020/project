<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});

Auth::routes();
Route::get('/logout',[LoginController::class,'logout'])->name('cst_logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::post('/store', [HomeController::class, 'store'])->name('store');
    Route::get('/logo', [HomeController::class, 'logo'])->name('logo');
    Route::delete('/logo-delete/{id}', [HomeController::class, 'logoDelete'])->name('logo.delete');
    Route::post('/logo-upload', [HomeController::class, 'logoUpload'])->name('logo.upload');
    Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
    Route::post('/testimonials-create', [HomeController::class, 'testimonialsCreate'])->name('testimonials.create');
    Route::delete('/testimonials-delete/{id}', [HomeController::class, 'testimonialsDelete'])->name('testimonials.delete');
    Route::get('blog',[HomeController::class, 'blog'])->name('blog');
    Route::get('contact-us',[HomeController::class, 'contactUs'])->name('contact-us');

    Route::delete('/contact-delete/{id}', [HomeController::class, 'contactUsDelete'])->name('contact.delete');
    Route::delete('/blog-delete/{id}', [HomeController::class, 'blogDelete'])->name('blog.delete');
    Route::post('/lobloggo-upload', [HomeController::class, 'blogUpload'])->name('blog.upload');

});

