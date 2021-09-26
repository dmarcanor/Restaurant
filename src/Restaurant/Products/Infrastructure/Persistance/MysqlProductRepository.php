<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Infrastructure\Persistance;

use Illuminate\Support\Facades\DB;
use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;

final class MysqlProductRepository implements ProductRepository
{
    public function create(Product $product): void
    {
        DB::table(Product::TABLE)
            ->insert($product->toArray());
    }
}
