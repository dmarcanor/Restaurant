<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Response;

use Sys\Restaurant\Order\Application\Response\OrderResponse;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderCode;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderState;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderTotal;
use Sys\Restaurant\OrderItem\Domain\Entity\OrderItems;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class OrderResponseMother
{
    public static function create(
        OrderId             $id,
        OrderCode           $code,
        OrderTotal          $total,
        TableId             $tableId,
        OrderState          $state,
        OrderItems          $orderItems,
        DateTimeValueObject $created_at,
        DateTimeValueObject $updated_at
    ): OrderResponse
    {
        return new OrderResponse(
            $id->value(),
            $code->value(),
            $total->value(),
            $tableId->value(),
            $state->value(),
            $orderItems->toArray(),
            $created_at->value(),
            $updated_at->value()
        );
    }

    public static function fromEntity(Order $order): OrderResponse
    {
        return self::create(
            $order->id(),
            $order->code(),
            $order->total(),
            $order->tableId(),
            $order->state(),
            $order->items(),
            $order->createdAt(),
            $order->updatedAt()
        );
    }
}
