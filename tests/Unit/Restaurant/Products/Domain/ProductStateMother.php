<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Domain;

use Sys\Restaurant\Products\Domain\ValueObjects\ProductState;
use Tests\Unit\Shared\Domain\SelectMother;

final class ProductStateMother
{
    public static function create(string $price): ProductState
    {
        return new ProductState($price);
    }

    public static function random(): ProductState
    {
        return self::create(
            SelectMother::fromValues(['active', 'inactive'])
        );
    }
}
