<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDeleteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductUpdateController;
use App\Http\Controllers\StaffController;
use App\Models\User;
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

// Toegestaan voor deze rollen: Iedereen
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::resource('/products', ProductController::class);
Route::get('/search', [ProductController::class, 'show']);

// Toegestaan voor deze rollen: Medewerker, Admin
Route::post('/updatestatus', [ProductUpdateController::class, 'update']); // Voor de statustoggle dmv AJAX
Route::resource('/profile', UserController::class)
    ->middleware('auth');

Route::get('/products/{product}/delete', [ProductDeleteController::class, 'delete'])
    ->name('product.delete');
Route::delete('/products/{product}', [ProductDeleteController::class, 'destroy'])
    ->name('product.destroy');

// Toegestaan voor deze rollen: Admin
Route::get('/staff/{user}/delete', [StaffController::class, 'delete'])
    ->name('staff.delete');
Route::delete('/staff/{user}', [StaffController::class, 'destroy'])
    ->name('staff.destroy');
Route::resource('/staff', StaffController::class);
