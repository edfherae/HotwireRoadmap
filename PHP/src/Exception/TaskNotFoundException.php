<?php

declare(strict_types=1);

namespace App\Exception;

class TaskNotFoundException extends \RuntimeException
{
    public static function withId(int $id): self
    {
        return new self("Task with id $id not found");
    }
}
