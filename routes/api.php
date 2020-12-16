<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::apiResource('/', TodoController::class);
Route::get('/', [TodoController::class, 'get']);
Route::post('/', [TodoController::class, 'post']);
Route::put('/{id}', [TodoController::class, 'update']);
Route::delete('/{id}', [TodoController::class, 'delete']);