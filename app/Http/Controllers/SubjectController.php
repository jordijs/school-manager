<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate();
        return view('Subjects', compact('subjects'));
    }
    
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
            ], 201);
        } catch (ValidationException $exception) {
            return response([
                'errors' => $exception->errors(),
                'message' => 'Validation failed'
            ], 422);
        }
    }

    public function get($id)
    {
        try{
            $subject = Subject::findOrFail($id);
            return response([
                'subject' => $subject,
                'message' => 'Subject retrieved successfully'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Subject not found'
            ], 404);
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

    public function edit (Request $request, $id)
    {
        try{
            $subject = Subject::findOrFail($id);

            try {
                $request->validate([
                    'name' => 'string|max:255',
                    'school_year' => 'in:1,2,3,4'
                ]);

                if ($request->name) {
                    $subject->name = $request->name;
                }
                if ($request->school_year) {
                    $subject->school_year = $request->school_year;
                }
                $subject->save();

                return response([
                    'subject' => $subject,
                    'message' => 'Subject updated successfully'
                ], 200);
            } catch (ValidationException $exception) {
                return response([
                    'errors' => $exception->errors(),
                    'message' => 'Validation failed'
                ], 422);
            }
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Subject not found'
            ], 404);
        }
    }

    public function delete($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            
            $subject->delete();

            return response([
                'message' => 'Subject deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Subject not found',
            ], 404);
        }
    }

    public function getAverageGrade($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $grades = $subject->grades;

            if ($grades->isEmpty()) {
                return response([
                    'message' => 'No grades found for this subject'
                ], 404);
            } else {
                $average = $grades->average('grade');
                $roundedAverage = round($average, 2);

                return response([
                    'average' => $roundedAverage,
                    'message' => 'Average grade retrieved successfully'
                ], 200);
            }

        } catch (ModelNotFoundException $exception) {
            return response([
                'message' => 'Subject not found'
            ], 404);
        }
    }

}
