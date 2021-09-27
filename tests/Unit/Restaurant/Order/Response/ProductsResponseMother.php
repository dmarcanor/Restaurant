<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Response;

use Sys\Restaurant\Products\Application\Response\ProductResponse;
use Sys\Restaurant\Products\Application\Response\OrdersResponse;
use Sys\Restaurant\Products\Domain\Entity\Product;

final class ProductsResponseMother
{
    public static function create(ProductResponse ...$products): OrdersResponse
    {
        return new OrdersResponse(
            ...$products
        );
    }

    public  static function fromEntities(Product ...$products): OrdersResponse
    {
        $arrayResponse = [];

        foreach ($products as $product) {
            $arrayResponse[] = ProductResponseMother::fromEntity($product);
        }

        return self::create(
            ...$arrayResponse
        );
    }

    public static function ByCategory(string $category, Product ...$products): OrdersResponse
    {
        $onlyCategory = array_filter($products, function (Product $product) use ($category) {
            return $product->category()->value() === $category;
        });

        $arrayResponse = array_map(function (Product $product) {
            return ProductResponseMother::fromEntity($product);
        }, $onlyCategory);

        return self::create(
            ...$arrayResponse
        );
    }
}
