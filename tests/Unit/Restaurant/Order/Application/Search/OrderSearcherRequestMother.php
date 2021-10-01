<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Search;


use Sys\Restaurant\Order\Application\Search\OrderSearcherRequest;

final class OrderSearcherRequestMother
{
    public static function create(array $filters): OrderSearcherRequest
    {
        return new OrderSearcherRequest(
            $filters
        );
    }

    public static function byState(string $state): OrderSearcherRequest
    {
        return self::create(
            [
                ['field' => 'state', 'value' => $state]
            ]
        );
    }
}
