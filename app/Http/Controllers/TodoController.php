<?php

namespace App\Http\Controllers;

use App\Pattern\Services\TodoService;
use Illuminate\Http\Request;
use App\Models\todoApps;

class TodoController extends Controller
{
    private TodoService $todoService;

    public function __construct()
    {
        $this->todoService = new TodoService;
    }

    public function showTodo()
    {
        return response()->json([
            'status'   => 200,
            'message'  => 'Show Todo List Successfully',
            'data'     => $this->todoService->getTasks(),
        ]);
    }

    public function createTodo(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|min:8',
            'description' => 'required|string',
            'assigned'    => 'required|string',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'assigned'    => $request->assigned,
        ];

        $dataSaved = [
            'title'       => $data['title'],
            'description' => $data['description'],
            'assigned'    => $data['assigned']
        ];

        $id = $this->todoService->addTask($dataSaved);

        return response()->json([
            'status'  => 200,
            'message' => 'Create Todo List Successfully',
        ]);
    }

    public function updateTodo(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|min:8',
            'description' => 'required|string',
            'assigned'    => 'required|string',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'assigned'    => $request->assigned,
        ];

        $dataSaved = [
            'title'       => $data['title'],
            'description' => $data['description'],
            'assigned'    => $data['assigned']
        ];

        $idTodo = $this->todoService->getById($id);

        $dataSave = $this->todoService->updateTodo($dataSaved, $idTodo->id);

        return response()->json([
            'status'  => 200,
            'message' => 'Update Todo List Successfully',
        ]);
    }

    public function deleteTodo($id)
    {
        $todolist = $this->todoService->getById($id);

        $deleteTodo = $this->todoService->deleteTodo($todolist->id);

        return response()->json([
            'status'  => 200,
            'message' => 'Delete Todo List Successfully',
        ]);
    }
}
