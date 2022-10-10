<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\TrashbinController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/store', [AuthController::class, 'validateUser'])->name('auth.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


    Route::controller(ComplaintController::class)->group(function () {
        Route::group([
            'prefix' => 'complaint'
        ], function () {
            Route::get('/', 'index')->name('complaint.index');
            Route::get('/create', 'create')->name('complaint.create');
            Route::post('/store', 'store')->name('complaint.store');
            Route::get('/edit/{id}', 'edit')->name('complaint.edit');
            Route::put('/update/{id}', 'update')->name('complaint.update');
            Route::get('/show/{id}', 'show')->name('complaint.show');
            Route::get('/settled/{id}', 'settled')->name('complaint.settled');
        });
    });

    Route::controller(HouseholdController::class)->group(function () {
        Route::group([
            'prefix' => 'household'
        ], function () {
            Route::get('/', 'index')->name('household.index');
            Route::get('/create', 'create')->name('household.create');
            Route::post('/store', 'store')->name('household.store');
            Route::get('/edit/{id}', 'edit')->name('household.edit');
            Route::put('/update/{id}', 'update')->name('household.update');
            Route::get('/show/{id}', 'show')->name('household.show');
        });
    });

    Route::controller(IncidentController::class)->group(function () {
        Route::group([
            'prefix' => 'incident'
        ], function () {
            Route::get('/', 'index')->name('incident.index');
            Route::get('/create', 'create')->name('incident.create');
            Route::post('/store', 'store')->name('incident.store');
            Route::get('/edit/{id}', 'edit')->name('incident.edit');
            Route::put('/update/{id}', 'update')->name('incident.update');
            Route::get('/show/{id}', 'show')->name('incident.show');
        });
    });

    Route::controller(OfficialController::class)->group(function () {
        Route::group([
            'prefix' => 'official'
        ], function () {
            Route::get('/', 'index')->name('official.index');
        });
    });

    Route::controller(TrashbinController::class)->group(function () {
        Route::group([
            'prefix' => 'trashbin'
        ], function () {
            Route::get('/', 'index')->name('trashbin.index');
        });
    });
});
