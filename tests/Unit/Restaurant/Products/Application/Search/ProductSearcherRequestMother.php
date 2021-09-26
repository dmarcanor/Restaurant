<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Search;

use Sys\Restaurant\Products\Application\Seach\ProductSearcherRequest;

final class ProductSearcherRequestMother
{
    public static function create(array $filters): ProductSearcherRequest
    {
        return new ProductSearcherRequest(
            $filters,
            null, null, null, null
        );
    }

    public function byCategory(string $category): ProductSearcherRequest
    {
        return self::create(
            [
                ['field' => 'category', 'value' => $category]
            ]
        );
    }
}
