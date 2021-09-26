<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Application\Seach;

use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;

final class ProductSearcher
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }


}
