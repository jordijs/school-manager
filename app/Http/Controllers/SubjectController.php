<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubjectController extends Controller
{
    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'school_year' => 'required|in:1,2,3,4'
            ]);

            $subject = Subject::create([
                'name' => $request->name,
                'school_year' => $request->school_year,
            ]);

            return response([
                'subject' => $subject,
                'message' => 'Subject created successfully'
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
        $subjects = Subject::all();

        return response([
            'subjects' => $subjects,
            'message' => 'Subjects retrieved successfully'
        ], 200);
    }
}
