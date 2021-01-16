<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BookcartController;
use App\Http\Controllers\RentalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();
Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::post('/search', [BookController::class, 'search'])->name('book.search');
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('rental/book', [RentalController::class, 'mybook'])->name('rental.book');
Route::get('rental/detail', [RentalController::class, 'mydetail'])->name('rental.detail');
Route::resource('category', CategoryController::class);
Route::resource('bookcart', BookcartController::class);
Route::resource('rental', RentalController::class);
Route::resource('area', AreaController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
