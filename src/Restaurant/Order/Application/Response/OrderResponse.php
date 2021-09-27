<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Application\Response;

final class OrderResponse
{
    private $id;
    private $code;
    private $total;
    private $tableId;
    private $state;
    private $items;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        string $id,
        string $code,
        float  $total,
        string $tableId,
        string $state,
        array  $items,
        string $createdAt,
        string $updatedAt
    )
    {
        $this->id           = $id;
        $this->code         = $code;
        $this->total        = $total;
        $this->tableId      = $tableId;
        $this->state        = $state;
        $this->items        = $items;
        $this->createdAt    = $createdAt;
        $this->updatedAt    = $updatedAt;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function total(): float
    {
        return $this->total;
    }

    public function tableId(): string
    {
        return $this->tableId;
    }

    public function state(): string
    {
        return $this->state;
    }

    public function items(): array
    {
        return $this->items;
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
