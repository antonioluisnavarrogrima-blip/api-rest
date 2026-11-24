<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AcademyController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

Route::apiResource('academies', AcademyController::class)->middleware('auth:sanctum')->name('logout');
Route::apiResource('courses', CourseController::class)->middleware('auth:sanctum')->name('logout');
Route::apiResource('students', StudentController::class)->middleware('auth:sanctum')->name('logout');