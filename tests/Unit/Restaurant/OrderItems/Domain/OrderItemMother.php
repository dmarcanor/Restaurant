<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\OrderItems\Domain;

use Sys\Restaurant\Order\Application\Create\OrderCreatorRequest;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\OrderItem\Domain\Entity\OrderItem;
use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemId;
use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemQuantity;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Tests\Unit\Restaurant\Order\Domain\OrderIdMother;
use Tests\Unit\Restaurant\Products\Domain\ProductIdMother;
use Tests\Unit\Shared\Domain\NumberMother;

final class OrderItemMother
{
    public static function create(
        OrderItemId       $id,
        OrderId           $orderId,
        ProductId         $productId,
        OrderItemQuantity $quantity
    ): OrderItem
    {
        return OrderItem::create(
            $id,
            $orderId,
            $productId,
            $quantity
        );
    }

    public static function random(): OrderItem
    {
        return self::create(
            OrderItemIdMother::random(),
            OrderIdMother::random(),
            ProductIdMother::random(),
            OrderItemQuantityMother::random()
        );
    }

    public static function fromRequest(OrderCreatorRequest $request): array
    {
        return array_map(function ($item) {
            return self::create(
                $item['id'],
                $item['orderId'],
                $item['productId'],
                $item['quantity'],
            );
        }, $request->items());
    }
}
