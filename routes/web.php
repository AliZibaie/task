<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('role:admin')->group(function () {
    Route::resource('news', NewsController::class);
});

Route::middleware('guest')->group(function (){
    Route::get('register', [AuthController::class, 'showRegister'])
        ->name('show.register');
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');
});
Route::middleware('auth')->group(function () {
    Route::post('dashboard',[AuthController::class, 'logout'])->name('logout');
});
