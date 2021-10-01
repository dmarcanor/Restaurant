<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Infrastructure\Persistence;

use Sys\Shared\Infrastructure\Persistence\MysqlQueryFilters;

final class MysqlTableFilters extends MysqlQueryFilters
{
    public function number($value): void
    {
        $this->builder->where('tables.number', '=', $value);
    }

    public function state($value): void
    {
        $this->builder->where('tables.state', '=', $value);
    }
}
