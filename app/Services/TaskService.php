<?php
namespace App\Services;

use App\Contracts\TaskServiceInterface;
use App\Models\Task;
use App\Models\User;
use App\Http\Responses\ApiResponse;

class TaskService implements TaskServiceInterface
{
    public function createTask(array $data)
    {
        $task = new Task($data);
        $user = User::where('email', $data['user'])->first();
        if (!$user) {
            return ApiResponse::formatError(404, "User {$data['user']} not found.");
        }
        $task->user_id = $user->id;
        $task->save();

        return ApiResponse::formatSuccess(201,'Task created successfully.', array_merge($task->toArray(), ['user' => $user->toArray()]));
    }
    public function getTasks()
    {
        $tasks = Task::with('user')->get();
        return ApiResponse::formatSuccess(200, null, $tasks);
    }

    public function updateTask(int $idTask, array $data)
    {
        $task = Task::with('user')->find($idTask);

        if(!$task) {
            return ApiResponse::formatError(404, "Task not found.");
        }

        $task->update($data);

        return ApiResponse::formatSuccess(200,'Task updated successfully.', $task);

    }

    public function deleteTask(int $idTask)
    {
        $task = Task::find($idTask);

        if(!$task) {
            return ApiResponse::formatError(404, "Task not found.");
        }

        //  No se puede borrar una tarea que ya este completada
        if ($task->completed) {
            return ApiResponse::formatError(400, "Cannot deleted completed task.");
        }

        $task->delete();

        return ApiResponse::formatSuccess(200,'Task deleted successfully.');
    }
}
