<?php

namespace App\Repository;

use App\Contract\TaskRepositoryInterface;
use App\Enum\TaskStatus;
use App\Exception\TaskNotFoundException;
use App\Model\Task;
use App\Trait\TimestampableTrait;

final class InMemoryTaskRepository implements TaskRepositoryInterface
{
    use TimestampableTrait;


    function __construct(private array $tasks = [])
    {
        $this->touch();
    }

    public function add(Task $task): void
    {
        $this->tasks[] = $task;
        $this->touch();
    }
    public function all(): array
    {
        return $this->tasks;
    }
    public function findById(int $id): Task
    {
        foreach ($this->tasks as $task) {
            if ($task->id === $id) return $task;
        }
        throw TaskNotFoundException::withId($id);
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
