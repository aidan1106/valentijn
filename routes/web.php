<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValentijnController;

Route::get('/', [ValentijnController::class, 'index'])->name('valentijn.index');
Route::post('/planning', [ValentijnController::class, 'planning'])->name('valentijn.planning');
Route::get('/activiteit/{type}', [ValentijnController::class, 'activiteit'])->name('valentijn.activiteit');
