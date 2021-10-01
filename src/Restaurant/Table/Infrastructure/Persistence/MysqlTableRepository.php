<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Infrastructure\Persistence;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Sys\Restaurant\Table\Domain\Contracts\TableRepository;
use Sys\Restaurant\Table\Domain\Entity\Table;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;

final class MysqlTableRepository implements TableRepository
{

    public function find(TableId $id): ?Table
    {
        $table = DB::table(Table::TABLE)
            ->where('id', '=', $id->value())
            ->first();

        if (empty($table))
            return null;

        return Table::fromValues(
            $table->id,
            $table->number,
            $table->QR,
            $table->state,
            $table->created_at,
            $table->updated_at
        );
    }

    public function matching(array $filters): array
    {
        $tables = DB::table(Table::TABLE)
            ->where(function (Builder $builder) use ($filters){
                (new MysqlTableFilters())->apply($builder, $filters);
            })
            ->get()
            ->toArray();

        return array_map(function (\stdClass $table) {
            return Table::fromValues(
                $table->id,
                $table->number,
                $table->QR,
                $table->state,
                $table->created_at,
                $table->updated_at
            );
        }, $tables);
    }
}
