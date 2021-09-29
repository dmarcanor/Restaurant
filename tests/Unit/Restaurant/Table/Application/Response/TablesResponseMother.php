<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Application\Response;

use Sys\Restaurant\Table\Application\Response\TableResponse;
use Sys\Restaurant\Table\Application\Response\TablesResponse;
use Sys\Restaurant\Table\Domain\Entity\Table;

final class TablesResponseMother
{
    public static function create(TableResponse ...$tables): TablesResponse
    {
        return new TablesResponse(
            ...$tables
        );
    }

    public static function ByState(string $state, Table ...$tables): TablesResponse
    {
        $onlyActives = array_filter($tables, function (Table $table) use ($state) {
            return $table->state()->value() === $state;
        });

        $arrayResponse = array_map(function (Table $table) {
            return TableResponseMother::fromEntity($table);
        }, $onlyActives);

        return self::create(
            ...$arrayResponse
        );
    }
}
