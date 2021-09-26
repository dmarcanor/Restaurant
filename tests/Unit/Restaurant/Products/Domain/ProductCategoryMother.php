<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Domain;

use Sys\Restaurant\Products\Domain\ValueObjects\ProductCategory;
use Tests\Unit\Shared\Domain\SelectMother;

final class ProductCategoryMother
{
    public static function create(string $category): ProductCategory
    {
        return new ProductCategory($category);
    }

    public static function random(): ProductCategory
    {
        return self::create(
            SelectMother::fromValues(['platillo', 'bebida', 'postre'])
        );
    }
}
