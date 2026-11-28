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

Route::get('/academies/{academy}/courses', [AcademyController::class, 'courses']);

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//gestión de matriculaciones
Route::middleware('auth:sanctum')->group(function () { //Formo un grupo de rutas que tendrán el middleware de sanctum
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::apiResource('academies', AcademyController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('students', StudentController::class);

    Route::get('/courses/{course}/students', [CourseController::class, 'students']);
    Route::post('/courses/{course}/students', [CourseController::class, 'enroll']);
    Route::delete('/courses/{course}/students/{student}', [CourseController::class, 'unenroll']);
});