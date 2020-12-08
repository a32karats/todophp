<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::post('/', [TodoController::class, 'post']);
Route::delete('/{id}', [TodoController::class, 'delete']);
Route::put('/{id}', [TodoController::class, 'update']);