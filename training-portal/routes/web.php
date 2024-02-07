<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserTrainingController;
use App\Http\Controllers\ListOfTrainingController;
use App\Http\Controllers\TrainingRequestController;
use App\Http\Controllers\UserTrainingRequestController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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




Route::middleware(['auth', 'verified'])->group(function () {
    // Route for Homepage / Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })
        ->name('dashboard');

    // Route for List of Controller
    Route::controller(ListOfTrainingController::class)->group(function () {

        // Route for List of Training
        Route::get('/list-of-training', 'show_list_of_training')
            ->name('list-of-training');

        // Route for Adding List of Training
        Route::get('/add_list_of_training', 'add_list_of_training')
            ->name('add_list_of_training');

        // Route for Storing Newly Added List Of Training to Database
        Route::post('/store_list_of_training', 'store_list_of_training')
            ->name('store_list_of_training');

        // Route for Redirecting to Editing of List of Training
        Route::get('/list_of_training/{list_of_training}/edit', 'edit_list_of_training');

        // Route for Updating the edited List of Training to Database
        Route::put('/list_of_training/{list_of_training}/update', 'update_list_of_training')
            ->name('update_list_of_training');

        // Route for  Deleting the selected List of Training from Database
        Route::delete('/list_of_training/{list_of_training}/delete', 'delete_list_of_training')
            ->name('delete_list_of_training');
    });

    // Route for Training Request
    Route::controller(TrainingRequestController::class)->group(function () {
        // Route for Displaying Training Request
        Route::get('/training_request', 'index')
            ->name('training-request');
        Route::get('/training_request/{training_request}/accept', 'accept')
            ->name('accept');
        Route::get('/training_request/{training_request}/reject', 'reject')
            ->name('reject');
        Route::get('/training_request/{training_request}/done', 'done')
            ->name('done');
    });


    // Route for User Training Request
    Route::controller(UserTrainingRequestController::class)->group(function () {
        Route::get('/home', 'index')
            ->name('show_user_training_list');
        Route::get('/add/{add}', 'create')
            ->name('add_user_training_list');
        Route::post('/store', 'store')
            ->name('store_user_training_list');
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
