<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Application\Response;

final class TableResponse
{
    private $id;
    private $number;
    private $QR;
    private $state;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        string $id,
        int $number,
        string $QR,
        string $state,
        string $createdAt,
        string $updatedAt
    )
    {
        $this->id = $id;
        $this->number = $number;
        $this->QR = $QR;
        $this->state = $state;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function number(): int
    {
        return $this->number;
    }

    public function QR(): string
    {
        return $this->QR;
    }

    public function state(): string
    {
        return $this->state;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function updatedAt(): string
    {
        return $this->updatedAt;
    }
}
