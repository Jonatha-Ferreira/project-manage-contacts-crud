<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::resource('contacts', ContactController::class);