<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Domain;

use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Tests\Unit\Shared\Domain\UuidMother;

final class OrderIdMother
{
    public static function create(string $id): OrderId
    {
        return new OrderId($id);
    }

    public static function random(): OrderId
    {
        return self::create(
            UuidMother::random()
        );
    }
}
