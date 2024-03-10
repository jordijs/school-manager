<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/* 
CREATE NEW STUDENT
Usage: Send with the Body as JSON, with format:
{
    "name": "YourName",
    "surname": "YourSurname",
    "birthday": "YYYY-MM-DD"
}
*/
Route::post('/students', [StudentController::class, 'create']);

// GET ALL STUDENTS
Route::get('/students', [StudentController::class, 'getAll']);

/* 
UPDATE DATA OF A STUDENT
Usage: 
1. Send the student ID to be edited as a parameter in the URL.
2. Send the new data with the Body as JSON, with format:
{
    "name": "YourName",
    "surname": "YourSurname",
    "birthday": "YYYY-MM-DD"
}
*/
Route::put('/students/{id}', [StudentController::class, 'edit']);

/* 
CREATE NEW SUBJECT
Usage: Send with the Body as JSON, with format:
{
    "name": "SubjectName",
    "school_year": 1, 2, 3 or 4
}
*/
Route::post('/subjects', [SubjectController::class, 'create']);

// GET ALL STUDENTS
Route::get('/subjects', [SubjectController::class, 'getAll']);

/*
UPDATE DATA OF A SUBJECT
Usage:
1. Send the subject ID to be edited as a parameter in the URL.
2. Send the new data with the Body as JSON, with format:
{
    "name": "SubjectName",
    "school_year": 1, 2, 3 or 4
}
*/
Route::put('/subjects/{id}', [SubjectController::class, 'edit']);