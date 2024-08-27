<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
        $todos = Todo::all();

        return response()->json([
            'status' => 200,
            'data' => $todos,
            'length' => count($todos)
        ]);
    }

    public function show($id) {
        $todo = Todo::find($id);

        return response()->json([
            'status' => 200,
            'data' => $todo
        ]);
    }

    public function store(Request $request) {
        $todo = Todo::create([
            'activity' => $request['activity'],
            'description' => $request['description']
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'Todo created successfully',
            'data' => $todo
        ]);
    }

    public function update(Request $request, $id) {
        $todo = Todo::find($id)->update([
            'activity' => $request['activity'],
            'description' => $request['description']
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'Todo updated successfully',
            'data' => $todo
        ]);
    }

    public function destroy($id) {
        Todo::find($id)->delete();

        return response()->json([
            'status' => 204,
            'message' => 'Todo deleted successfully'
        ]);
    }

    //
}
