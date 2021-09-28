<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Domain;

use Sys\Restaurant\Order\Domain\ValueObjects\OrderTotal;
use Tests\Unit\Shared\Domain\FloatMother;

final class OrderTotalMother
{
    public static function create(float $value): OrderTotal
    {
        return new OrderTotal($value);
    }

    public static function random(): OrderTotal
    {
        return self::create(
            FloatMother::randomPositive()
        );
    }
}
