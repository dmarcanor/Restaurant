<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Response;

use Sys\Restaurant\Products\Application\Response\ProductResponse;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductAvailable;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductCategory;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductName;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductPrice;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductState;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class ProductResponseMother
{
    public static function create(
        ProductId           $id,
        ProductName         $name,
        ProductCategory     $category,
        ProductPrice        $price,
        ProductAvailable    $available,
        ProductState        $state,
        DateTimeValueObject $created_at,
        DateTimeValueObject $updated_at
    ): ProductResponse
    {
        return new ProductResponse(
            $id->value(),
            $name->value(),
            $category->value(),
            $price->value(),
            $available->value(),
            $state->value(),
            $created_at->value(),
            $updated_at->value()
        );
    }

    public static function fromEntity(Product $product): ProductResponse
    {
        return self::create(
            $product->id(),
            $product->name(),
            $product->category(),
            $product->price(),
            $product->available(),
            $product->state(),
            $product->created_at(),
            $product->updated_at()
        );
    }
}
