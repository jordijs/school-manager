<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'birthday' => 'required|date'
            ]);

            $student = Student::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'birthday' => $request->birthday
            ]);

            return response([
                'student' => $student,
                'message' => 'Student created successfully'
            ], 200);
        } catch (ValidationException $exception) {
            return response([
                'errors' => $exception->errors(),
                'message' => 'Validation failed'
            ], 422);
        }
    }
}
