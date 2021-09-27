<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Domain;

use Sys\Restaurant\Table\Domain\ValueObjects\TableId;
use Tests\Unit\Shared\Domain\UuidMother;

final class TableIdMother
{
    public static function create(string $id): TableId
    {
        return new TableId($id);
    }

    public static function random(): TableId
    {
        return self::create(
            UuidMother::random()
        );
    }
}
