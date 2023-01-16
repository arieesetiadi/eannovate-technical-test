<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\RequestController;
use App\Http\Requests\API\ClassRequest;
use App\Models\ClassModel;

class ClassController extends Controller
{
    // Properties
    private static $url = 'http://eannovate-test-case.test/api/class';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Request data "class" using API
        $response = RequestController::get(self::$url);

        // Check response status
        if ($response->status != 200) {
            return "Failed retrieving \"Class\" data from API";
        }

        // Send data to Class view
        $classes = $response->data;
        return view('admin.class.index', [
            'title' => 'Class',
            'classes' => $classes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Send data to Class view
        $majors = self::getMajors();

        return view('admin.class.create', [
            'title' => 'Add Class',
            'majors' => $majors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $admin = auth()->user()->username;
        $id = 'CLS' . (ClassModel::count() + 1);

        // Prepare post data
        $class = [
            'id' => $id,
            'name' => $request->name,
            'major' => $request->major,
            'created_by' => $admin,
            'modified_by' => $admin
        ];

        // Post prepared data to the API
        $response = RequestController::post(self::$url, $class);

        // Check response status
        if ($response->status != 200) {
            return "Failed sending \"Class\" data to the API";
        }

        // Redirect to class view
        return redirect()->route('class.index')->with('status', [
            'type' => 'success',
            'message' => 'Class added successfully'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Request data "class" using API
        $response = RequestController::get(self::$url, $id);

        // Check response status
        if ($response->status != 200) {
            return "Failed retrieving \"Class\" data from API";
        }

        // Send data to Edit Class view
        $class = $response->data;
        $majors = self::getMajors();

        return view('admin.class.edit', [
            'title' => 'Edit Class',
            'class' => $class,
            'majors' => $majors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, $id)
    {
        $admin = auth()->user()->username;

        // Prepare post data
        $class = [
            'name' => $request->name,
            'major' => $request->major,
            'modified_by' => $admin,
        ];

        // Post prepared data to the API
        $response = RequestController::put(self::$url, $id, $class);

        // Check response status
        if ($response->status != 200) {
            return "Failed updating \"Class\" data using API";
        }

        // Redirect to class view
        return redirect()->route('class.index')->with('status', [
            'type' => 'success',
            'message' => 'Class updated successfully'
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
        // Delete class by id
        $response = RequestController::delete(self::$url, $id);

        // Check response status
        if ($response->status != 200) {
            return "Failed delete \"Class\" data using the API";
        }

        // Redirect to class view
        return redirect()->route('class.index')->with('status', [
            'type' => 'success',
            'message' => 'Class deleted successfully'
        ]);
    }

    public static function getMajors()
    {
        $url = 'https://eannov8.com/career/case/getMajor.json';
        $response = RequestController::get($url);

        // Check response status
        if ($response->status != 200) {
            return "Failed retrieving \"Majors\" data from API";
        }

        // Send majors data
        return $response->data;
    }
}
