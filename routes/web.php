<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// Survey routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::resource('surveys', SurveyController::class)->except(['edit', 'update']);
    
    Route::get('/surveys/{survey}/responses', [ResponseController::class, 'index'])
        ->name('responses.index');
});

// Response routes (public for submitting, protected for viewing)
Route::get('/surveys/{survey}/feedback', [ResponseController::class, 'create'])
    ->name('responses.create');
Route::post('/surveys/{survey}/feedback', [ResponseController::class, 'store'])
    ->name('responses.store');
Route::get('/thank-you', [ResponseController::class, 'thankyou'])
    ->name('responses.thankyou');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
