<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Infrastructure\Persistance;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;

final class MysqlProductRepository implements ProductRepository
{
    public function create(Product $product): void
    {
        DB::table(Product::TABLE)
            ->insert($product->toArray());
    }

    public function update(Product $product): void
    {
        // TODO: Implement update() method.
    }

    public function find(ProductId $id): ?Product
    {
        // TODO: Implement find() method.
    }

    public function matching(array $filters): array
    {
        $products = DB::table(Product::TABLE)
            ->where(function (Builder $builder) use($filters) {
                (new MysqlProductFilters())->apply($builder, $filters);
            })
            ->get()
            ->toArray();

        return array_map(function (\stdClass $product) {
            return Product::fromValues(
                $product->id,
                $product->name,
                $product->category,
                $product->price,
                (bool)$product->available,
                $product->state,
                $product->created_at,
                $product->updated_at
            );
        }, $products);
    }
}
