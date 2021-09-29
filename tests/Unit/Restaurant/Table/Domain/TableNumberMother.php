<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Domain;

use Sys\Restaurant\Table\Domain\ValueObjects\TableNumber;
use Tests\Unit\Shared\Domain\NumberMother;

final class TableNumberMother
{
    public static function create(int $value): TableNumber
    {
        return new TableNumber($value);
    }

    public static function random(): TableNumber
    {
        return self::create(
            NumberMother::randomPositive()
        );
    }
}
