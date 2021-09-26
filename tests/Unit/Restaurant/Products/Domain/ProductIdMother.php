<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Domain;

use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Tests\Unit\Shared\Domain\UuidMother;

final class ProductIdMother
{
    public static function create(string $id): ProductId
    {
        return new ProductId($id);
    }

    public static function random(): ProductId
    {
        return self::create(
            UuidMother::random()
        );
    }
}
