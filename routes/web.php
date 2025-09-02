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

    Route::get('/formmaker/form', [App\Http\Controllers\FormMaker\FormController::class, 'index'])->name('formmaker.form.index');
    Route::get('/formmaker/form/{id}', [App\Http\Controllers\FormMaker\FormController::class, 'show'])->name('formmaker.form.show');
    Route::post('/formmaker/form', [App\Http\Controllers\FormMaker\FormController::class, 'store'])->name('formmaker.form.store');
    Route::put('/formmaker/form/{id}', [App\Http\Controllers\FormMaker\FormController::class, 'update'])->name('formmaker.form.update');
    Route::delete('/formmaker/form/{id}', [App\Http\Controllers\FormMaker\FormController::class, 'destroy'])->name('formmaker.form.destroy');

    Route::get('/formmaker/form_row', [App\Http\Controllers\FormMaker\FormRowController::class, 'index'])->name('formmaker.form_row.index');
    Route::get('/formmaker/form_row/{id}', [App\Http\Controllers\FormMaker\FormRowController::class, 'show'])->name('formmaker.form_row.show');
    Route::post('/formmaker/form_row', [App\Http\Controllers\FormMaker\FormRowController::class, 'store'])->name('formmaker.form_row.store');
    Route::put('/formmaker/form_row/{id}', [App\Http\Controllers\FormMaker\FormRowController::class, 'update'])->name('formmaker.form_row.update');
    Route::delete('/formmaker/form_row/{id}', [App\Http\Controllers\FormMaker\FormRowController::class, 'destroy'])->name('formmaker.form_row.destroy');
    Route::post('/formmaker/form_row/mass_store', [App\Http\Controllers\FormMaker\FormRowController::class, 'massStore'])->name('formmaker.form_row.mass_store');
    Route::post('/formmaker/form_row/update_form', [App\Http\Controllers\FormMaker\FormRowController::class, 'updateForm'])->name('formmaker.form_row.update_form');

    Route::get('/formmaker/question', [App\Http\Controllers\FormMaker\QuestionController::class, 'index'])->name('formmaker.question.index');
    Route::get('/formmaker/question/{id}', [App\Http\Controllers\FormMaker\QuestionController::class, 'show'])->name('formmaker.question.show');
    Route::post('/formmaker/question', [App\Http\Controllers\FormMaker\QuestionController::class, 'store'])->name('formmaker.question.store');
    Route::put('/formmaker/question/{id}', [App\Http\Controllers\FormMaker\QuestionController::class, 'update'])->name('formmaker.question.update');
    Route::delete('/formmaker/question/{id}', [App\Http\Controllers\FormMaker\QuestionController::class, 'destroy'])->name('formmaker.question.destroy');


    Route::view('/questionmaker/{any?}', 'layouts.formmaker')->where('any', '.*');
});
