<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/account/{id}', [AccountController::class, 'index'])->name('user.index');

Route::get('/normal/{id}', [AccountController::class, 'normal'])->name('user.normal');

Route::get('/admin/{id}', [AccountController::class, 'index'])->name('user.admin');

Route::get('/login/{id}', [AccountController::class, 'login']);

Route::get('/logout/{id}', [AccountController::class, 'logout']);

Route::get('/account/edit/{id}', [AccountController::class, 'edit' ])->name('account.edit');

Route::patch('/account/edit/{id}', [AccountController::class, 'update' ])->name('account.update');

Route::delete('/account/delete/{id}', [AccountController::class, 'destroy' ])->name('account.destroy');



require __DIR__.'/auth.php';
