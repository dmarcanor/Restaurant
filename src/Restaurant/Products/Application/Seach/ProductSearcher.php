<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Application\Seach;

use Sys\Restaurant\Products\Application\Response\ProductResponse;
use Sys\Restaurant\Products\Application\Response\ProductsResponse;
use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;

final class ProductSearcher
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ProductSearcherRequest $request): ProductsResponse
    {
        return new ProductsResponse(... array_map(
            $this->toResponse(),
            $this->repository->matching($request->filters())
        ));
    }

    private function toResponse(): callable
    {
        return function (Product $product) {
            return new ProductResponse(
                $product->id()->value(),
                $product->name()->value(),
                $product->category()->value(),
                $product->price()->value(),
                $product->available()->value(),
                $product->state()->value(),
                $product->created_at()->value(),
                $product->updated_at()->value()
            );
        };
    }
}
