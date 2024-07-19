<?php

use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\HomeController;
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

