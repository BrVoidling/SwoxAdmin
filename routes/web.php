<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\MainController::class, 'dashboard'])->name('dashboard');

    Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])->name('form');
    Route::get('/forms/{id}', [App\Http\Controllers\FormController::class, 'show'])->name('forms.show');

});
