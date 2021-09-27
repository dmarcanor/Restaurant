<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Domain;

use Sys\Restaurant\Order\Domain\ValueObjects\OrderState;
use Tests\Unit\Shared\Domain\SelectMother;

final class OrderStateMother
{
    public static function create(string $value): OrderState
    {
        return new OrderState($value);
    }

    public static function random(): OrderState
    {
        return self::create(
            SelectMother::fromValues(['active', 'inactive'])
        );
    }
}
