<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Paginate all students data
        $students = StudentModel::orderByDesc('created_date')->paginate(10);
        // Return data to student view
        return view('admin.student.index', [
            'title' => 'Student',
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create', [
            'title' => 'Add Student'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        // Get student data from form
        $student = [
            'id' => "STD" . (StudentModel::count() + 1),
            'username' => $request->username,
            'email' => $request->email,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'created_by' => auth()->user()->username,
            'created_date' => now(),
            'modified_by' => auth()->user()->username,
            'modified_date' => now(),
        ];

        // Upload picture if exist
        if ($request->file('picture') != null) {
            $file = $request->file('picture');
            $path = 'images/profiles/';
            $student['picture'] = FileController::upload($file, $path);
        }

        // Insert student to database
        StudentModel::create($student);

        return redirect()->route('student.index')->with('status', [
            'type' => 'success',
            'message' => 'Student added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('student/show', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get student by id
        $student = StudentModel::find($id);
        // Return data to student edit view
        return view('admin.student.edit', [
            'title' => 'Edit Student',
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        // Get new student data from edit-form
        $newStudent = [
            'username' => $request->username,
            'email' => $request->email,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'modified_by' => auth()->user()->username,
            'modified_date' => now(),
        ];

        // Upload picture if exist
        if ($request->file('picture') != null) {
            $file = $request->file('picture');
            $path = 'images/profiles/';
            $newStudent['picture'] = FileController::upload($file, $path);
        }

        // Update student using model
        StudentModel::find($id)->update($newStudent);

        return redirect()->route('student.index')->with('status', [
            'type' => 'success',
            'message' => 'Student updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete student by id
        StudentModel::find($id)->delete();

        return redirect()->route('student.index')->with('status', [
            'type' => 'success',
            'message' => 'Student deleted successfully'
        ]);
    }

    public function destroyMany(Request $request)
    {
        // Convert all student-ids into array
        $ids = explode(',', $request->ids);

        // Delete the student within ids[]
        StudentModel::whereIn('id', $ids)->delete();

        return redirect()->route('student.index')->with('status', [
            'type' => 'success',
            'message' => 'Selected students deleted successfully'
        ]);
    }
}
