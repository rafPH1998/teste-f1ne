<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/add', [UserController::class, 'create'])->name('users.create');
Route::post('/users/add', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');