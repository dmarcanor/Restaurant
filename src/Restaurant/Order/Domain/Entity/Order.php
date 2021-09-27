<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Domain\Entity;

use Sys\Restaurant\OrderItem\Domain\Entity\OrderItems;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderCode;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderState;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderTotal;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class Order
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
        OrderId $id,
        OrderCode $code,
        OrderTotal $total,
        TableId $tableId,
        OrderState $state,
        OrderItems $items,
        DateTimeValueObject $createdAt,
        DateTimeValueObject $updatedAt
    )
    {
        $this->id = $id;
        $this->code = $code;
        $this->total = $total;
        $this->tableId = $tableId;
        $this->state = $state;
        $this->items = $items;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        OrderId $id,
        OrderCode $code,
        OrderTotal $total,
        TableId $tableId,
        OrderState $state,
        OrderItems $items
    ): self
    {
        return new self(
            $id,
            $code,
            $total,
            $tableId,
            $state,
            $items,
            new DateTimeValueObject(),
            new DateTimeValueObject()
        );
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function code(): OrderCode
    {
        return $this->code;
    }

    public function total(): OrderTotal
    {
        return $this->total;
    }

    public function tableId(): TableId
    {
        return $this->tableId;
    }

    public function state(): OrderState
    {
        return $this->state;
    }

    public function items(): OrderItems
    {
        return $this->items;
    }

    public function createdAt(): DateTimeValueObject
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTimeValueObject
    {
        return $this->updatedAt;
    }

    public function changeCode(OrderCode $code): void
    {
        if (! $this->code->equals($code)) {
            $this->code = $code;
            $this->updatedAt = new DateTimeValueObject();
        }
    }

    public function changeTotal(OrderTotal $total): void
    {
        if (! $this->total->equals($total)) {
        $this->total = $total;
        $this->updatedAt = new DateTimeValueObject();
    }
    }

    public function changeTableId(TableId $tableId): void
    {
        if (! $this->tableId->equals($tableId)) {
            $this->tableId = $tableId;
            $this->updatedAt = new DateTimeValueObject();
        }
    }

    public function changeState(OrderState $state): void
    {
        if (! $this->state->equals($state)) {
            $this->state = $state;
            $this->updatedAt = new DateTimeValueObject();
        }
    }

//    public function changeItems(array $items): void
//    {
//        if (! $this->items->equals($items)) {
//            $this->items = $items;
//            $this->updatedAt = new DateTimeValueObject();
//        }
//    }
}
