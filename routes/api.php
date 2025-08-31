<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index']);       // Fetch all students
    Route::get('/{id}', [StudentController::class, 'show']);   // Fetch single student
    Route::post('/', [StudentController::class, 'store']);     // Add new student
    Route::put('/{id}', [StudentController::class, 'update']); // Update student
    Route::delete('/{id}', [StudentController::class, 'destroy']); // Delete student
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
