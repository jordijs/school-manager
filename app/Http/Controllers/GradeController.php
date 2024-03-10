<?php

namespace App\Http\Controllers;

use App\Models\Grade;
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
            if ($request->has('grade')) {
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
}
