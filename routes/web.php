<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** Detail Quiz */
Route::get('/kuis/{quiz_id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('kuis.detail');

/** Start Quiz */
Route::get('/kuis/{quiz_id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('kuis.detail');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    /** Dashboard admin */
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    /** Quiz Admin */
    Route::resource('kuis', QuizController::class);

    /** Question Admin */
    Route::resource('pertanyaan', QuestionController::class);

    /** Users Admin */
    Route::resource('pengguna', UserController::class);
});
