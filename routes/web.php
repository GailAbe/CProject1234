<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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


Route::get('/', function () {
    return view('modules/dashboard');
});

// Route::group(function () {
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/store', [AuthController::class, 'validateUser'])->name('auth.store');
    // Route::post('/login', [AuthController::class, 'store'])->name('login.store');
// });

// Route::middleware('auth')->group(function () {
//     // Route::get('/', [MainController::class, 'home'])->name('home');
//     // Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// });

