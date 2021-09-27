<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Domain;

use Sys\Restaurant\OrderItem\Domain\Entity\OrderItems;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;
use Sys\Restaurant\Order\Application\Create\OrderCreatorRequest;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderCode;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderState;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderTotal;
use Tests\Unit\Restaurant\OrderItems\Domain\OrderItemsMother;
use Tests\Unit\Restaurant\Table\Domain\TableIdMother;

final class OrderMother
{
    public static function create(
        OrderId    $id,
        OrderCode  $code,
        OrderTotal $total,
        TableId    $mesaId,
        OrderState $state,
        OrderItems $orderItem
    ): Order
    {
        return Order::create(
            $id,
            $code,
            $total,
            $mesaId,
            $state,
            $orderItem
        );
    }

    public static function random(): Order
    {
        return self::create(
            OrderIdMother::random(),
            OrderCodeMother::random(),
            OrderTotalMother::random(),
            TableIdMother::random(),
            OrderStateMother::random(),
            OrderItemsMother::random()
        );
    }

    public static function fromRequest(OrderCreatorRequest $request): Order
    {
        return self::create(
            OrderIdMother::create($request->id()),
            OrderCodeMother::create($request->code()),
            OrderTotalMother::create($request->total()),
            TableIdMother::create($request->tableId()),
            OrderStateMother::create($request->state()),
            OrderItemsMother::create($request->items())
        );
    }

    public static function withState(string $state): Order
    {
        return self::create(
            OrderIdMother::random(),
            OrderCodeMother::random(),
            OrderTotalMother::random(),
            TableIdMother::random(),
            OrderStateMother::create($state),
            OrderItemsMother::random()
        );
    }
}
