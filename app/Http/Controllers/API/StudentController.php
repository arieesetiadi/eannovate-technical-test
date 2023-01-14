<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\StudentClassModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        try {
            // Check if any params
            if ($request->class_id) {
                // Get students by class_id
                $data = StudentClassModel
                    ::where('class_id', $request->class_id)
                    ->with('student')
                    ->with('class')
                    ->get();
            } else {
                $data = StudentModel::all();
            }

            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        }
        // Catch if any error
        catch (\Throwable $th) {
            return response()->json($th);
        }
    }

    public function insert(Request $request)
    {
        try {
            // Get admin data / the user who insert this
            $admin = auth('api')->user();
            // Prepare student data
            $studentClasses = [];
            $studentId = 'STD' . (StudentModel::count() + 1);
            $student = [
                'id' => $studentId,
                'username' => $request->name,
                'age' => $request->age,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'picture' => $request->picture,
                'created_by' => $admin->username,
                'modified_by' => $admin->username,
                'created_date' => now(),
                'modified_date' => now(),
            ];
            // Insert student using model
            StudentModel::create($student);

            // Assign class if exist
            if (count($request->class_id) > 0) {
                foreach ($request->class_id as $classId) {
                    // Prepare student class data
                    $studentClasses[] = [
                        'student_id' => $studentId,
                        'class_id' => $classId,
                        'created_by' => auth()->user()->username,
                        'created_date' => now()
                    ];
                }
            }
            // Insert all student classes data at once
            StudentClassModel::insert($studentClasses);

            return response()->json([
                'status' => 200,
                'data' => $student
            ], 200);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }
}
