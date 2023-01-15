<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\ClassModel;
use App\Models\StudentClassModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
            $data = [];
            if ($request->class_id) {
                // Get students by class_id
                $students = StudentClassModel
                    ::where('class_id', $request->class_id)
                    ->with('student')
                    ->get()
                    ->pluck('student');
            } else {
                // Get all students if there is no params
                $students = StudentModel::orderByDesc('created_date')->get();
            }

            // Response error if no student found
            if (!count($students)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data not found.'
                ], 404);
            }

            // Refactor students data as requested
            foreach ($students as $i => $student) {
                // Get student classes
                $studentClasses = StudentClassModel
                    ::where('student_id', $student->id)
                    ->with('class')
                    ->get()
                    ->pluck('class');

                // Filter array students
                $data[$i] = Arr::except($student, [
                    'created_by', 'created_date', 'modified_by', 'modified_date'
                ]);
                $data[$i]['class'] = $studentClasses;
            }

            return response()->json([
                'status' => 200,
                'data' => $data
            ], 200);
        }
        // Catch if any error
        catch (\Exception $th) {
            return response()->json($th);
        }
    }

    public function insert(StudentRequest $request)
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
        } catch (\Exception $th) {
            return response()->json($th);
        }
    }
}
