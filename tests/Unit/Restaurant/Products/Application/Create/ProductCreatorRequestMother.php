<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Create;

use Sys\Restaurant\Products\Application\Create\ProductCreatorRequest;
use Tests\Unit\Restaurant\Products\Domain\ProductAvailableMother;
use Tests\Unit\Restaurant\Products\Domain\ProductCategoryMother;
use Tests\Unit\Restaurant\Products\Domain\ProductIdMother;
use Tests\Unit\Restaurant\Products\Domain\ProductNameMother;
use Tests\Unit\Restaurant\Products\Domain\ProductPriceMother;
use Tests\Unit\Restaurant\Products\Domain\ProductStateMother;

final class ProductCreatorRequestMother
{
    public static function random()
    {
        return new ProductCreatorRequest(
            ProductIdMother::random()->value(),
            ProductNameMother::random()->value(),
            ProductCategoryMother::random()->value(),
            ProductPriceMother::random()->value(),
            ProductAvailableMother::random()->value(),
            ProductStateMother::random()->value()
        );
    }
}
