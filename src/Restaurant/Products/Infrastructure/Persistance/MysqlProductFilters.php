<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Infrastructure\Persistance;

use Sys\Shared\Infrastructure\Persistence\MysqlQueryFilters;

final class MysqlProductFilters extends MysqlQueryFilters
{
    public function category(string $value): void
    {
        $this->builder->where('productos.category', '=', $value);
    }
}
