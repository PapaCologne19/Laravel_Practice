<?php

use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'showLoginForm'])->name('Login');
Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('Register');
Route::post('/registerAccount', [HomeController::class, 'registerAccount'])->name('registerAccount');
