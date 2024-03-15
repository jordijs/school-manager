<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('all');
});

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/{id}', [StudentController::class, 'showById'])->name('student');
Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects');
Route::get('/subjects/{id}', [SubjectController::class, 'showById'])->name('subject');

