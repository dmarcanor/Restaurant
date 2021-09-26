<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Domain\Contracts;

use Sys\Restaurant\Products\Domain\Entity\Product;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;

interface ProductRepository
{
    public function create(Product $product): void;

    public function update(Product $product): void;

    public function find(ProductId $id): ?Product;
}
