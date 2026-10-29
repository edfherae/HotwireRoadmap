<?php

declare(strict_types=1);

namespace App\Model;

use App\Enum\TaskStatus;

class Task
{
    public function __construct(public readonly  int $id, public readonly string $title, public readonly TaskStatus $status, public readonly array $tags = []) {}
    public function withStatus(TaskStatus $status): self
    {
        return new self($this->id, $this->title, $status, $this->tags);
    }
    public function __toString(): string
    {
        return "#$this->id $this->title {$this->status->label()}";
    }
}
