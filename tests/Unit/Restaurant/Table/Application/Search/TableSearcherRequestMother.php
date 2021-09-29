<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Application\Search;

use Sys\Restaurant\Table\Application\Search\TableSearcherRequest;

final class TableSearcherRequestMother
{
    public static function create(array $filters): TableSearcherRequest
    {
        return new TableSearcherRequest(
            $filters,
            null, null, null, null
        );
    }

    public static function byState(string $state): TableSearcherRequest
    {
        return self::create(
            [
                ['field' => 'state', 'value' => $state]
            ]
        );
    }
}
