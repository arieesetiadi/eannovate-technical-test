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
        dd('student/edit', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('student/update', $id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('student/destroy', $id);
    }

    public function destroyMany(Request $request)
    {
        dd($request->all());
    }
}
