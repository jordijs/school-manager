<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate();
        return view('Students', compact('students'));
    }

    public function showById($id)
    {
        $student = Student::findOrFail($id);
        return view('Student', compact('student'));
    }

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
            ], 201);
        } catch (ValidationException $exception) {
            return response([
                'errors' => $exception->errors(),
                'message' => 'Entered data is invalid'
            ], 422);
        }
    }

    public function get($id)
    {
        try{
            $student = Student::findOrFail($id);
            return response([
                'student' => $student,
                'message' => 'Student retrieved successfully'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Student not found'
            ], 404);
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

    public function edit(Request $request, $id)
    {
        try {
            $student = Student::findOrFail($id);

            try {
                $request->validate([
                    'name' => 'string|max:255',
                    'surname' => 'string|max:255',
                    'birthday' => 'date'
                ]);

                if ($request->name) {
                    $student->name = $request->name;
                }
                if ($request->surname) {
                    $student->surname = $request->surname;
                }
                if ($request->birthday) {
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

    public function getGrades($id)
    {
        try {
            $student = Student::findOrFail($id);
            $grades = $student->grades;

            if ($grades->isEmpty()) {
                return response([
                    'message' => 'No grades found for this student'
                ], 404);
            }

            return response([
                'grades' => $grades,
                'message' => 'Grades retrieved successfully'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Student not found'
            ], 404);
        }
    }

    public function getAverageGrade($id)
    {
        try {
            $student = Student::findOrFail($id);
            $grades = $student->grades;

            if ($grades->isEmpty()) {
                return response([
                    'message' => 'No grades found for this student'
                ], 404);
            } else {
                $average = $grades->average('grade');
                $roundedAverage = round($average, 2);
                
                return response([
                    'average' => $roundedAverage,
                    'message' => 'Average retrieved successfully'
                ], 200);
            }
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Student not found'
            ], 404);
        }
    }
}
