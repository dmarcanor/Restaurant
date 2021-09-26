<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Domain\Services;

use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Sys\Restaurant\Products\Domain\Exceptions\ProductNotExists;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;

final class ProductFinder
{
    private $repository;

    public function __construct(
        ProductRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(ProductId $id): ?Product
    {
        $product = $this->repository->find($id);

        if (null === $product)
            throw new ProductNotExists("There's not any product with the ID {$id->value()}");

        return $product;
    }
}
