<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AreaController;
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
Route::resource('category', CategoryController::class);
Route::resource('area', AreaController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
