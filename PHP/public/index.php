<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

use App\Enum\TaskStatus;
use App\Exception\TaskNotFoundException;
use App\Model\Task;
use App\Repository\InMemoryTaskRepository;
use App\Service\TaskService;

/* // 0.2
    $service = new TaskService();

    for ($i = 0; $i < 5; $i++) {
        $service->add(new Task($i, "task $i", TaskStatus::ToDo));
    }

    $service->add(new Task(5, "task 5", TaskStatus::Done));

    foreach ($service->all() as $task) {
        echo $task, PHP_EOL;
    }

    echo PHP_EOL, 'Done:', PHP_EOL;

    foreach ($service->findByStatus(TaskStatus::Done) as $task) {
        echo $task, PHP_EOL;
    }
*/

// 0.3

$repo = new InMemoryTaskRepository();

$repo->add(new Task(1, "task 1", TaskStatus::ToDo));
$repo->add(new Task(2, "task 2", TaskStatus::InProgress));
$repo->add(new Task(3, "task 3", TaskStatus::Done));

echo $repo->findById(1), PHP_EOL;

try {
    $repo->findById(999);
} catch (TaskNotFoundException $e) {
    echo $e->getMessage(), PHP_EOL;
}

foreach ($repo->findByStatus(TaskStatus::Done) as $task) {
    echo $task, PHP_EOL;
}

echo $repo->getCreatedAt()->format("Y-m-d H:i:s"), PHP_EOL;
