<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Application\Update;

final class OrderUpdaterRequest
{
    private $id;
    private $code;
    private $total;
    private $tableId;
    private $state;
    private $items;

    public function __construct(
        string $id,
        string $code,
        float  $total,
        string $tableId,
        string $state,
        array  $items
    )
    {
        $this->id       = $id;
        $this->code     = $code;
        $this->total    = $total;
        $this->tableId  = $tableId;
        $this->state    = $state;
        $this->items    = $items;
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
}
