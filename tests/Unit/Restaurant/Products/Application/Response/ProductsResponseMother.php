<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Response;

use Sys\Restaurant\Products\Application\Response\ProductResponse;
use Sys\Restaurant\Products\Application\Response\ProductsResponse;
use Sys\Restaurant\Products\Domain\Entity\Product;

final class ProductsResponseMother
{
    public static function create(ProductResponse ...$products): ProductsResponse
    {
        return new ProductsResponse(
            ...$products
        );
    }

    public  static function fromEntities(Product ...$products): ProductsResponse
    {
        $arrayResponse = [];

        foreach ($products as $product) {
            $arrayResponse[] = ProductResponseMother::fromEntity($product);
        }

        return self::create(
            ...$arrayResponse
        );
    }
}
