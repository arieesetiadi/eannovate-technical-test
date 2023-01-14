<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        echo json_encode("GET STUDENTS");
    }

    public function insert(StudentRequest $request)
    {
        echo json_encode($request->all());
    }
}
