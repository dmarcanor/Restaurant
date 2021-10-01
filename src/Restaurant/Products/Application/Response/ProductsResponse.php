<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Application\Response;

final class ProductsResponse
{
    private $products;

    public function __construct(ProductResponse ...$products)
    {
        $this->products = $products;
    }

    public function products(): array
    {
        return $this->products;
    }

    public function toArray(): array
    {
        return array_map(function (ProductResponse $product) {
            return $product->toArray();
        }, $this->products);
    }
}
