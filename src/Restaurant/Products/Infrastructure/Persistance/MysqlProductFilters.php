<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Infrastructure\Persistance;

use Sys\Shared\Infrastructure\Persistence\MysqlQueryFilters;

final class MysqlProductFilters extends MysqlQueryFilters
{
    public function category(string $value): void
    {
        $this->builder->where('products.category', '=', $value);
    }

    public function state(string $value): void
    {
        $this->builder->where('products.state', '=', $value);
    }

    public function available(bool $value): void
    {
        $this->builder->where('products.available', '=', $value);
    }
}
