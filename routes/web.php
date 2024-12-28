<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'showForm']); // Show the form
Route::post('/submit-form', [FormController::class, 'submitForm'])->name('form.submit'); // Handle form submission

Route::get('/', function () {
    return view('welcome');
});
