<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GradeController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'student_id' => 'required|integer|exists:App\Models\Student,id',
                'subject_id' => 'required|integer|exists:App\Models\Subject,id',
                'grade' => 'numeric|between:0,10'
            ]);

            $gradeData['student_id'] = $request->student_id;
            $gradeData['subject_id'] = $request->subject_id;
            if ($request->grade) {
                $gradeData['grade'] = $request->grade;
            }

            $grade = Grade::create($gradeData);

            return response([
                'student' => $grade,
                'message' => 'Grade created successfully'
            ], 200);
        } catch (ValidationException $exception) {
            return response([
                'errors' => $exception->errors(),
                'message' => 'Entered data is invalid'
            ], 422);
        }
    }

    public function getAll()
    {
        $grades = Grade::all();

        return response([
            'grades' => $grades,
            'message' => 'Grades retrieved successfully'
        ], 200);
    }

    public function edit(Request $request, $id)
    {
        try {
            $grade = Grade::findOrFail($id);

            try {
                $request->validate([
                    'student_id' => 'integer|exists:App\Models\Student,id',
                    'subject_id' => 'integer|exists:App\Models\Subject,id',
                    'grade' => 'numeric|between:0,10'
                ]);

                if ($request->student_id)
                {
                    $grade->student_id = $request->student_id;
                }
                if ($request->subject_id) {
                    $grade->subject_id = $request->subject_id;
                }
                if ($request->grade) {
                    $grade->grade = $request->grade;
                }
                $grade->save();

                return response([
                    'grade' => $grade,
                    'message' => 'Grade updated successfully'
                ], 200);
            } catch (ValidationException $exception) {
                return response([
                    'errors' => $exception->errors(),
                    'message' => 'Entered data is invalid'
                ], 422);
            }
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Grade not found'
            ], 404);
        }
    }

    public function delete($id)
    {
        try {
            $grade = Grade::findOrFail($id);
            $grade->delete();

            return response([
                'message' => 'Grade deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Grade not found'
            ], 404);
        }
    }


}
