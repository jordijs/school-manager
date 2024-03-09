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

/* Usage: Send with the Body as JSON, with format:
{
    "name": "YourName",
    "surname": "YourSurname",
    "birthday": "YYYY-MM-DD"
}
*/
Route::post('/students', [StudentController::class, 'create']);
Route::post('/subjects', [SubjectController::class, 'create']);
