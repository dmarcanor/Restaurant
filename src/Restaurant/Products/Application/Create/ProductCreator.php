<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Application\Create;

use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductAvailable;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductCategory;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductName;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductPrice;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductState;

final class ProductCreator
{
    private $repository;

    public function __construct(
        ProductRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(ProductCreatorRequest $request): void
    {
        $product = Product::create(
            new ProductId($request->id()),
            new ProductName($request->name()),
            new ProductCategory($request->category()),
            new ProductPrice($request->price()),
            new ProductAvailable($request->available()),
            new ProductState($request->state())
        );

        $this->repository->create($product);
    }
}
