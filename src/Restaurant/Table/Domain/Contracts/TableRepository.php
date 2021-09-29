<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Domain\Contracts;

use Sys\Restaurant\Table\Domain\Entity\Table;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;

interface TableRepository
{
    public function find(TableId $id): ?Table;

    public function matching(array $filters): array;
}
