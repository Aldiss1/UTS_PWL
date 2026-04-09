<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/destination/{destination}', [PublicController::class, 'show'])->name('destination.show');
