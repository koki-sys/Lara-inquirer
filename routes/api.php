<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BookcartController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Api\LoginController;

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

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::post('/search', [BookController::class, 'search'])->name('book.search');
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('rental/book', [RentalController::class, 'mybook'])->name('rental.book');
Route::get('rental/detail', [RentalController::class, 'mydetail'])->name('rental.detail');
Route::resource('category', CategoryController::class);
Route::resource('bookcart', BookcartController::class);
Route::resource('rental', RentalController::class);
Route::resource('area', AreaController::class);
