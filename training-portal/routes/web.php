<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ListOfTrainingController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/training-request', function () {
    return Inertia::render('Training/TrainingRequest');
})->middleware(['auth', 'verified'])->name('training-request');

Route::get('/list-of-training', [ListOfTrainingController::class, 'show_list_of_training'])
    ->name('list-of-training');

Route::get('/add_list_of_training', function () {
    return Inertia::render('Training/ListOfTraining/create');
})->middleware(['auth', 'verified'])->name('add_list_of_training');

Route::post('/store_list_of_training', [ListOfTrainingController::class, 'store_list_of_training'])
    ->name('store_list_of_training');

Route::get('/list_of_training/{list_of_training}/edit', [ListOfTrainingController::class, 'edit_list_of_training'])
    ->name('edit_list_of_training');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
