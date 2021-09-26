<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Domain;

use Sys\Restaurant\Products\Domain\ValueObjects\ProductPrice;
use Tests\Unit\Shared\Domain\FloatMother;

final class ProductPriceMother
{
    public static function create(float $price): ProductPrice
    {
        return new ProductPrice($price);
    }

    public static function random(): ProductPrice
    {
        return self::create(
            FloatMother::randomPositive()
        );
    }
}
