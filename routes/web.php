<?php

use App\Http\Controllers\AccountController;
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


Route::get('/account/{id}', [AccountController::class, 'index'])->middleware('auth')->name('user.index');

Route::get('/normal/{id}', [AccountController::class, 'normal'])->name('user.normal');

Route::get('/admin/{id}', [AccountController::class, 'admin'])->name('user.admin');

Route::get('/login/{id}', [AccountController::class, 'login']);

Route::get('/logout/{id}', [AccountController::class, 'logout']);

