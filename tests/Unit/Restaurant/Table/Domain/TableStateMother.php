<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Domain;

use Sys\Restaurant\Table\Domain\ValueObjects\TableState;
use Tests\Unit\Shared\Domain\SelectMother;

final class TableStateMother
{
    public static function create(string $value): TableState
    {
        return new TableState($value);
    }

    public static function random(): TableState
    {
        return self::create(
            SelectMother::fromValues(['available', 'unavailable'])
        );
    }
}
