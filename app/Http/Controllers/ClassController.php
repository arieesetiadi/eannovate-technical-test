<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\RequestController;
use Illuminate\Http\Request;


class ClassController extends Controller
{
    public function index()
    {
        // Request data "class" using API
        $url = 'http://eannovate-test-case.test/api/class';
        $response = RequestController::get($url);

        // Check response status
        if ($response->status != 200) {
            return "Failed retrieving \"Class\" data from API";
        }

        // Send data to Class view
        $classes = $response->data->data;
        return view('admin.class.index', [
            'title' => 'Class',
            'classes' => $classes
        ]);
    }

    public function create()
    {
        // Request data "class" using API
        $url = 'https://eannov8.com/career/case/getMajor.json';
        $response = RequestController::get($url);

        // Check response status
        if ($response->status != 200) {
            return "Failed retrieving \"Majors\" data from API";
        }

        // Send data to Class view
        $majors = $response->data;
        return view('admin.class.create', [
            'title' => 'Add Class',
            'majors' => $majors
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        dd('class edit ', $id);
    }

    public function destroy($id)
    {
        dd('class delete ', $id);
    }
}
