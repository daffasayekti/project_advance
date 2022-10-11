<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('todoapps')->group(function () {
    Route::get('/show_todo', [TodoController::class, 'showTodo']);
    Route::post('/create_todo', [TodoController::class, 'createTodo']);
    Route::put('/update_todo/{id}', [TodoController::class, 'updateTodo']);
    Route::delete('/delete_todo/{id}', [TodoController::class, 'deleteTodo']);
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
