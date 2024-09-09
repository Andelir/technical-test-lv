<?php
namespace App\Contracts;

interface TaskServiceInterface
{
    public function createTask(array $data);

    public function getTasks();

    public function updateTask(int $idTask, array $data);

    public function deleteTask(int $idTask);
}
