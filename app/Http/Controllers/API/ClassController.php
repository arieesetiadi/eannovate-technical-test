<?php

namespace App\Http\Controllers\API;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ClassRequest;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        // Get one class if receive id query
        if ($request->query('id')) {
            $id = $request->query('id');
            $data = ClassModel::find($id);
        } else {
            $data = ClassModel::orderByDesc('created_date')->get();
        }

        // Paginate class data
        return json_encode([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function store(ClassRequest $request)
    {
        // Get class data from request
        $class = [
            'id' => $request->id,
            'name' => $request->name,
            'major' => $request->major,
            'created_by' => $request->created_by,
            'modified_by' => $request->modified_by,
            'created_date' => now(),
            'modified_date' => now(),
        ];

        // Insert data to database using model
        $result = ClassModel::create($class);

        // Return response
        echo json_encode([
            'status' => 200,
            'result' => $result
        ]);
    }

    public function update(Request $request)
    {
        // Get class id from request query
        $id = $request->query('id');
        $class = [
            'name' => $request->name,
            'major' => $request->major,
            'modified_by' => $request->modified_by,
            'modified_date' => now()
        ];

        // Update class by id using model
        $result = ClassModel::find($id)->update($class);

        echo json_encode([
            'status' => 200,
            'result' => $result
        ]);
    }

    public function destroy($id)
    {
        // Delete class by id
        $result = ClassModel::find($id)->delete();

        echo json_encode([
            "status" => 200,
            "result" => $result
        ]);
    }
}
