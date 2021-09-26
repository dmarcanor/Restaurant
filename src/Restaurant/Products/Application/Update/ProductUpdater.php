<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Application\Update;

use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Services\ProductFinder;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductAvailable;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductCategory;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductName;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductPrice;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductState;

final class ProductUpdater
{
    private $repository;
    private $finder;

    public function __construct(
        ProductRepository $repository
    )
    {
        $this->repository = $repository;
        $this->finder = new ProductFinder($repository);
    }

    public function __invoke(ProductUpdaterRequest $request): void
    {
        $product = ($this->finder)(new ProductId($request->id()));

        $product->changeName(new ProductName($request->name()));
        $product->changeCategory(new ProductCategory($request->category()));
        $product->changePrice(new ProductPrice($request->price()));
        $product->changeAvailable(new ProductAvailable($request->available()));
        $product->changeState(new ProductState($request->state()));

        $this->repository->update($product);
    }
}
