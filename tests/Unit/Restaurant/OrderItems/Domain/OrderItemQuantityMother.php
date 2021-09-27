<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\OrderItems\Domain;

use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemQuantity;
use Tests\Unit\Shared\Domain\FloatMother;

final class OrderItemQuantityMother
{
    public static function create(float $value): OrderItemQuantity
    {
        return new OrderItemQuantity($value);
    }

    public static function random(): OrderItemQuantity
    {
        return self::create(
            FloatMother::randomPositive()
        );
    }
}
