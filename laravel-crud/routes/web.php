<?php

use App\Models\Fruit;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApplicantController;

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

// Route for Welcome Page
Route::get('/', function(){
    return view('login');
});

Route::get('/counter', function(){
    return view('counter');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


// Route for Products
Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product', [ProductsController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductsController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductsController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete', [ProductsController::class, 'delete'])->name('product.delete');

// Rout for Customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{customer}/delete', [CustomerController::class, 'delete'])->name('customer.delete');

// Route for Location
Route::get('/location', [LocationController::class, 'index'])->name('location.index');
Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('/location', [LocationController::class, 'store'])->name('location.store');
Route::get('/location/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
Route::put('/location/{location}/update', [LocationController::class, 'update'])->name('location.update');
Route::delete('/location/{location}/delete', [LocationController::class, 'delete'])->name('location.delete');

// Route for Employee
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{employee}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');

// Route for Applicant
Route::get('/applicant', [ApplicantController::class, 'index'])->name('applicant.index');
Route::get('/applicant/create', [ApplicantController::class, 'create'])->name('applicant.create');
Route::post('/applicant/store', [ApplicantController::class, 'store'])->name('applicant.store');
Route::get('/applicant/{applicant}/edit', [ApplicantController::class, 'edit'])->name('applicant.edit');
Route::put('/applicat/{applicant}/update', [ApplicantController::class, 'update'])->name('applicant.update');
Route::delete('/applicant/{applicant}/delete', [ApplicantController::class, 'delete'])->name('applicant.delete');

// Route for Fruit
Route::get('/fruit', [FruitController::class, 'index'])->name('fruit.index');
Route::get('fruit/create', [FruitController::class, 'create'])->name('fruit.create');
Route::post('/fruit/store', [FruitController::class, 'store'])->name('fruit.store');
Route::get('fruit/{fruit}/edit', [FruitController::class, 'edit'])->name('fruit.edit');
Route::put('fruit/{fruit}/update', [FruitController::class, 'update'])->name('fruit.update');
Route::delete('fruit/{fruit}/delete', [FruitController::class, 'delete'])->name('fruit.delete');

// Route for Dog


// Route for Cat
Route::get('/cat', [CatController::class, 'index'])->name('cat.index'); 
Route::get('/cat/create', [CatController::class, 'create'])->name('cat.create');
Route::post('/cat/store', [CatController::class, 'store'])->name('cat.store');