<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

    public function getAll()
    {
        $students = Student::all();

        return response([
            'students' => $students,
            'message' => 'Students retrieved successfully'
        ], 200);
    }

    public function edit (Request $request, $id)
    {
        try{
            $student = Student::findOrFail($id);

            try {
                $request->validate([
                    'name' => 'string|max:255',
                    'surname' => 'string|max:255',
                    'birthday' => 'date'
                ]);
    
                if ($request->name){
                    $student->name = $request->name;
                }
                if ($request->surname){
                    $student->surname = $request->surname;
                }
                if ($request->birthday){
                $student->birthday = $request->birthday;
                }
                $student->save();
    
                return response([
                    'student' => $student,
                    'message' => 'Student updated successfully'
                ], 200);
            } catch (ValidationException $exception) {
                return response([
                    'errors' => $exception->errors(),
                    'message' => 'Validation failed'
                ], 422);
            }
        
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Student not found'
            ], 404);
        }
    }

    public function delete($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            return response([
                'message' => 'Student deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Student not found'
            ], 404);
        }
    }
}
