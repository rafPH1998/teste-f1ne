<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
1 - Jeito de definir as rotas
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/add', [UserController::class, 'create'])->name('users.create');
Route::post('/users/add', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{user}/edit', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
*/

/*
2 - Jeito que eu mais gosto de deixar as rotas
*/
Route::resource('users', UserController::class);

/*
Route Address
*/

Route::get('users/address/{user}', [AddressController::class, 'index'])->name('users.address');
Route::post('users/address/{user}', [AddressController::class, 'store'])->name('users.address.store');
Route::get('users/address/{user}/details', [AddressController::class, 'details'])->name('users.address.details');
Route::delete('users/address/{address}/destroy', [AddressController::class, 'destroy'])->name('users.address.destroy');