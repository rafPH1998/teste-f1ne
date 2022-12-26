<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
Do jeito 2 para se fazer
*/
// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users/add', [UserController::class, 'store'])->name('users.store');
// Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');


/*
Do jeito que eu gosto de fazer
*/
Route::apiResource('/users', UserController::class);
