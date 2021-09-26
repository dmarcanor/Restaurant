<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Domain;

use Sys\Restaurant\Products\Domain\ValueObjects\ProductAvailable;
use Tests\Unit\Shared\Domain\BoolMother;

final class ProductAvailableMother
{
    public static function create(bool $name): ProductAvailable
    {
        return new ProductAvailable($name);
    }

    public static function random(): ProductAvailable
    {
        return self::create(
            BoolMother::random()
        );
    }
}
