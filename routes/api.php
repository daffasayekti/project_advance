<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'todoapps', 'middleware' => 'auth:api'], function () {
    Route::get('/show_todo', [TodoController::class, 'showTodo']);
    Route::post('/create_todo', [TodoController::class, 'createTodo']);
    Route::put('/update_todo/{id}', [TodoController::class, 'updateTodo']);
    Route::delete('/delete_todo/{id}', [TodoController::class, 'deleteTodo']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});
