<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Domain;

use Sys\Restaurant\Table\Domain\ValueObjects\TableQR;
use Tests\Unit\Shared\Domain\FileMother;

final class TableQRMother
{
    public static function create(string $value): TableQR
    {
        return new TableQR($value);
    }

    public static function random(): TableQR
    {
        return self::create(
            FileMother::random()->route()
        );
    }
}
