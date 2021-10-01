<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Application\Response;

final class TablesResponse
{
    private $tables;

    public function __construct(TableResponse ...$tables)
    {
        $this->tables = $tables;
    }

    public function tables(): array
    {
        return $this->tables;
    }

    public function toArray(): array
    {
        return array_map(function (TableResponse $table) {
            return $table->toArray();
        }, $this->tables);
    }
}
