<?php

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
Route::get('/categories',[HomeController::class,'category'])->name('categories');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/detail/{id}',[HomeController::class,'detailPost'])->name('detailPost');