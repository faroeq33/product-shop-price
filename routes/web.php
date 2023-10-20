<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUpdateController;
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

Route::get('/', [ProductController::class, 'index']);
Route::resource('products', ProductController::class);
Route::get('/search', [ProductController::class, 'show']);
// Voor de statustoggle dmv AJAX
Route::post('/updatestatus', [ProductUpdateController::class, 'update']);
