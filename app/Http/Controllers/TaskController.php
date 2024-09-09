<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\TaskServiceInterface;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    // Obtener todas las tareas
    public function getTasks()
    {
        return $this->taskService->getTasks();
    }

    // Crear tarea
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'user' => 'required|email|max:255',
        ]);

        return $this->taskService->createTask($validated);
    }

    // Actualizar tarea
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'completed' => 'in:0,1'
            // 'title' => 'required|max:255',
            // 'description' => 'required|max:500',
        ]);

        return $this->taskService->updateTask($id, $validated);
    }

    // Eliminar tarea
    public function destroy($id)
    {
        return $this->taskService->deleteTask($id);
    }
}
