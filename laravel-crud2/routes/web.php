<?php

use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\BirdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

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

// Route for Login Page
Route::get('/', function () {
    return view('login'); });
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('showLogin');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

// Route for Registration Page
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('showRegister');
    Route::post('/register', 'register')->name('register');
});

// Route Validation
Route::middleware('auth')->group(
    function () {
        // Welcome Page
        Route::get('/welcome', function () {
            return view('welcome');
        })->name('welcome');

        // Route for Cat
        Route::controller(CatController::class)->group(function () {
            Route::name('cat.')->group(function () {
                Route::get('/cat', 'index')->name('index');
                Route::get('/cat/add', 'add')->name('add');
                Route::post('/cat/store', 'store')->name('store');
                Route::get('/cat/{cat}/edit', 'edit')->name('edit');
                Route::put('/cat/{cat}/update', 'update')->name('update');
                Route::delete('/cat/{cat}/delete', 'delete')->name('delete');
            });
        });

        // Route for Dog
        Route::controller(DogController::class)->group(function (){
            Route::name('dog.')->group(function(){
                Route::get('/dog', 'index')->name('index');
                Route::get('/dog/add', 'add')->name('add');
                Route::post('/dog/store', 'store')->name('store');
                Route::get('/dog/{dog}/edit', 'edit')->name('edit');
                Route::put('/dog/{dog}/update', 'update')->name('update');
                Route::delete('/dog/{dog}/delete', 'delete')->name('delete');
            });
        });

        // Route for Bird
        Route::controller(BirdController::class)->group(function (){
            Route::name('bird.')->group(function(){
                Route::get('/bird', 'index')->name('index');
                Route::get('/bird/create', 'create')->name('create');
                Route::post('/bird/store', 'store')->name('store');
                Route::get('/bird/edit/{bird}', 'edit')->name('edit');
                Route::put('/bird/update/{bird}', 'update')->name('update');
                Route::delete('/bird/destroy/{bird}', 'destroy')->name('destroy');
            });
        });
    }
);
