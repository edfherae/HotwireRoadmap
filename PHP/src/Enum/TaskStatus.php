<?php

declare(strict_types=1);

namespace App\Enum;

enum TaskStatus: string
{
    case ToDo = "todo";
    case InProgress = "in_progress";
    case Done = "done";

    public function label(): string
    {
        return match ($this) {
            self::Done => "сделано",
            self::InProgress => "в процессе",
            self::ToDo => "к выполнению"
        };
    }
}
