<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BookcartController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::post('/search', [BookController::class, 'search'])->name('book.search');
Route::get('rental/book', [RentalController::class, 'book'])->name('rental.book');
Route::get('rental/detail', [RentalController::class, 'detail'])->name('rental.detail');
Route::resource('category', CategoryController::class);
Route::resource('bookcart', BookcartController::class);
Route::resource('rental', RentalController::class);
Route::resource('area', AreaController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
