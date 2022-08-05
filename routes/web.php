<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsDetailsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;

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



Route::post('auth/save', [MainController::class, 'save'])->name('auth.save');
Route::post('auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('auth/logout', [MainController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
    
    Route::get('auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [MainController::class, 'register'])->name('auth.register');

    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('students-details', StudentsDetailsController::class);
    Route::get('students-details/{id}/delete', [StudentsDetailsController::class, 'destroy']);
    Route::get('students-details/search/students', [StudentsDetailsController::class, 'showSearch']);
    Route::post('students-details/search/students', [StudentsDetailsController::class, 'Search']);
    Route::get('students-details/{id}/edit/{page}', [StudentsDetailsController::class, 'edit']);
    Route::get('students-details/{id}/more-details/{page}', [StudentsDetailsController::class, 'moreDetails']);
});



