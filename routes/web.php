<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Admin\Category\CategoryController as AdminCate;
use App\Http\Controllers\AI\QuestionController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\common\ImageController;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/category/{slug?}', [CategoryController::class, 'index'])->name('category.index');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/detail/{slug}',[HomeController::class,'detailPost'])->name('detailPost');
Route::get('/search-results', [HomeController::class, 'search'])->name('search.results');


Route::prefix('/dashboard')->group(function () {
    Route::get('/', [AdminDashboardController::class,'index'])->middleware('is_admin')->name('admin.dashboard');
    Route::prefix('/posts')->group(function () {
        Route::get('/', [PostController::class,'index'])->middleware('is_admin')->name('admin.dashboard.posts.index');
        Route::get('/create', [PostController::class,'create'])->middleware('is_admin')->name('admin.dashboard.posts.create');
        Route::post('/store', [PostController::class,'store'])->middleware('is_admin')->name('admin.dashboard.posts.store');
        Route::get('/edit/{id}', [PostController::class,'show'])->middleware('is_admin')->name('admin.dashboard.posts.edit');
        Route::put('/update/{id}', [PostController::class,'update'])->middleware('is_admin')->name('admin.dashboard.posts.update');
        Route::delete('/delete/{id}', [PostController::class,'destroy'])->middleware('is_admin')->name('admin.dashboard.posts.delete');
    });
    Route::prefix('/categories')->group(function () {
        Route::get('/', [AdminCate::class,'index'])->middleware('is_admin')->name('admin.dashboard.categories.index');
        Route::get('/create', [AdminCate::class,'create'])->middleware('is_admin')->name('admin.dashboard.categories.create');
        Route::post('/store', [AdminCate::class,'store'])->middleware('is_admin')->name('admin.dashboard.categories.store');
        Route::get('/edit/{id}', [AdminCate::class,'edit'])->middleware('is_admin')->name('admin.dashboard.categories.edit');
        Route::put('/update/{id}', [AdminCate::class,'update'])->middleware('is_admin')->name('admin.dashboard.categories.update');
        Route::delete('/delete/{id}', [AdminCate::class,'destroy'])->middleware('is_admin')->name('admin.dashboard.categories.delete');
    });
    Route::prefix('/chat')->group(function () {
        Route::get('/', [QuestionController::class,'index'])->middleware('is_admin')->name('chat.ai');
        Route::post('/send', [QuestionController::class,'sendMessage'])->middleware('is_admin')->name('chat.sendMessage');
    });

});

Route::prefix('/auth')->group(function () {
    Route::get('/login',[AuthController::class,'LoadLoginform'])->name('auth.LoadLoginform');
    Route::get('/register',[AuthController::class,'LoadRegisterform'])->name('auth.LoadRegisterform');
    Route::get('/fogot',[AuthController::class,'LoadForgotForm'])->name('auth.LoadForgotform');
    Route::post('/login',[AuthController::class,'login'])->name('auth.login');
    Route::post('/register',[AuthController::class,'register'])->name('auth.register');
    Route::post('/logout',[AuthController::class,'logout'])->name('auth.logout');
    Route::post('/forgot',[AuthController::class,'submitFomrForgot'])->name('auth.submitfogot');
    Route::get('/reset-password/{token}',[AuthController::class,'resetPassword'])->name('auth.resetPassword');
    Route::post('/reset-password',[AuthController::class,'submitResetPassword'])->name('auth.submitResetPassword');
});


Route::post('/uploadimage', [ImageController::class, 'upload'])->name('image.upload')->middleware('web');



