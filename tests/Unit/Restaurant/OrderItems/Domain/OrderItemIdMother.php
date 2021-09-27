<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\OrderItems\Domain;

use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemId;
use Tests\Unit\Shared\Domain\UuidMother;

final class OrderItemIdMother
{
    public static function create(string $id): OrderItemId
    {
        return new OrderItemId($id);
    }

    public static function random(): OrderItemId
    {
        return self::create(
            UuidMother::random()
        );
    }
}
