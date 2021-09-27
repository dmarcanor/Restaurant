<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\OrderItems\Domain;

use Sys\Restaurant\OrderItem\Domain\Entity\OrderItems;
use Tests\Unit\Shared\Domain\NumberMother;

final class OrderItemsMother
{
    public static function create(array $items): OrderItems
    {
        return OrderItems::create($items);
    }

    public static function fromValues(array $items): OrderItems
    {
        return OrderItems::fromValues($items);
    }

    public static function random(): OrderItems
    {
        $orderItems = [];
        $randomNumber = NumberMother::randomWithMax(10);

        for ($i = 0; $i <= $randomNumber; $i++) {
            $orderItems[] = OrderItemMother::random()->toArray();
        }

        return self::fromValues($orderItems);
    }
}
