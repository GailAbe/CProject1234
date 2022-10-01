<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store', [AuthController::class, 'validateUser'])->name('auth.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::controller(ComplaintController::class)->group(function () {
    Route::group([
        'prefix' => 'complaint'
    ], function () {
        Route::get('/', 'index')->name('complaint.index');
        Route::get('/create', 'create')->name('complaint.create');
        Route::get('/store', 'store')->name('complaint.store');
        Route::get('/edit/{id}', 'edit')->name('complaint.edit');
        Route::get('/update/{id}', 'update')->name('complaint.update');
    });
});
