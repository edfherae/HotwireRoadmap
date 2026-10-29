<?php

declare(strict_types=1);

namespace App\Contract;

use App\Enum\TaskStatus;
use App\Model\Task;

interface TaskRepositoryInterface
{
    public function add(Task $task): void;
    public function all(): array;
    public function findById(int $id): ?Task;
    public function findByStatus(TaskStatus $status): array;
}
