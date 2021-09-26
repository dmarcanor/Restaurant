<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Domain;

use Sys\Restaurant\Products\Application\Create\ProductCreatorRequest;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductAvailable;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductCategory;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductName;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductPrice;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductState;

final class ProductMother
{
    public static function create(
        ProductId        $id,
        ProductName      $name,
        ProductCategory  $categoryId,
        ProductPrice     $price,
        ProductAvailable $available,
        ProductState     $state
    ): Product
    {
        return Product::create(
            $id,
            $name,
            $categoryId,
            $price,
            $available,
            $state
        );
    }

    public static function random(): Product
    {
        return self::create(
            ProductIdMother::random(),
            ProductNameMother::random(),
            ProductCategoryMother::random(),
            ProductPriceMother::random(),
            ProductAvailableMother::random(),
            ProductStateMother::random()
        );
    }

    public static function fromRequest(ProductCreatorRequest $request): Product
    {
        return self::create(
            ProductIdMother::create($request->id()),
            ProductNameMother::create($request->name()),
            ProductCategoryMother::create($request->category()),
            ProductPriceMother::create($request->price()),
            ProductAvailableMother::create($request->available()),
            ProductStateMother::create($request->state())
        );
    }

    public static function withCategory(string $category): Product
    {
        return self::create(
            ProductIdMother::random(),
            ProductNameMother::random(),
            ProductCategoryMother::create($category),
            ProductPriceMother::random(),
            ProductAvailableMother::random(),
            ProductStateMother::random()
        );
    }
}
