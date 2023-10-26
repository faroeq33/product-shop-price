<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductUpdateController;
use App\Http\Controllers\StaffController;
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

Auth::routes();

Route::get('/', [ProductController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/updatestatus', [ProductUpdateController::class, 'update']);
Route::resource('products', ProductController::class);
Route::get('/search', [ProductController::class, 'show']);

// Voor de statustoggle dmv AJAX

Route::resource('/profile', UserController::class)->middleware('auth');

Route::resource('/staff', StaffController::class);
