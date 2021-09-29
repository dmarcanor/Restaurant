<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Application\Find;

use Sys\Restaurant\Table\Application\Find\TableFinderRequest;

final class TableFinderRequestMother
{
    public static function create(string $id): TableFinderRequest
    {
        return new TableFinderRequest($id);
    }
}
