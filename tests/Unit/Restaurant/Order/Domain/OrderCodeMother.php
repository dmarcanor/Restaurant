<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Domain;

use Sys\Restaurant\Order\Domain\ValueObjects\OrderCode;
use Tests\Unit\Shared\Domain\CodeMother;

final class OrderCodeMother
{
    public static function create(string $codigo): OrderCode
    {
        return new OrderCode($codigo);
    }

    public static function random(): OrderCode
    {
        return self::create(
            CodeMother::random()
        );
    }
}
