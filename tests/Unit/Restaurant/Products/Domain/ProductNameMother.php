<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Domain;

use Sys\Restaurant\Products\Domain\ValueObjects\ProductName;
use Tests\Unit\Shared\Domain\NameMother;

final class ProductNameMother
{
    public static function create(string $name): ProductName
    {
        return new ProductName($name);
    }

    public static function random(): ProductName
    {
        return self::create(
            NameMother::random()
        );
    }
}
