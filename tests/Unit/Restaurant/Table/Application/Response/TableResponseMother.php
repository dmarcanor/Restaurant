<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Application\Response;

use Sys\Restaurant\Table\Application\Response\TableResponse;
use Sys\Restaurant\Table\Domain\Entity\Table;

final class TableResponseMother
{
    public static function create(
        string $id,
        int $number,
        string $QR,
        string $createdAt,
        string $updatedAt
    ): TableResponse
    {
        return new TableResponse(
            $id,
            $number,
            $QR,
            $createdAt,
            $updatedAt
        );
    }

    public static function fromEntity(Table $table): TableResponse
    {
        return self::create(
            $table->id()->value(),
            $table->number()->value(),
            $table->QR()->value(),
            $table->createdAt()->value(),
            $table->updatedAt()->value()
        );
    }
}
