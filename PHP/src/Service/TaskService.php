<?php

declare(strict_types=1);

namespace App\Service;

use App\Enum\TaskStatus;
use App\Model\Task;

class TaskService
{
    public function __construct(private array $tasks = []) {}
    public function add(Task $task): void
    {
        array_push($this->tasks, $task);
    }
    public function all(): array
    {
        return $this->tasks;
    }
    public function findByStatus(TaskStatus $status): array
    {
        $res = [];
        foreach ($this->tasks as $task) {
            if ($task->status === $status) $res[] = $task;
        }
        return $res;
    }
}
