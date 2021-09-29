<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Domain;

use Sys\Restaurant\Table\Domain\Entity\Table;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;
use Sys\Restaurant\Table\Domain\ValueObjects\TableNumber;
use Sys\Restaurant\Table\Domain\ValueObjects\TableQR;

final class TableMother
{
    public static function create(
        TableId $id,
        TableNumber $number,
        TableQR $QR
    ): Table
    {
        return Table::create($id, $number, $QR);
    }

    public static function random(): Table
    {
        return self::create(
            TableIdMother::random(),
            TableNumberMother::random(),
            TableQRMother::random()
        );
    }
}
