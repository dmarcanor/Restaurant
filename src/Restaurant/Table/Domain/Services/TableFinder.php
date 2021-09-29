<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Domain\Services;

use Sys\Restaurant\Table\Domain\Contracts\TableRepository;
use Sys\Restaurant\Table\Domain\Entity\Table;
use Sys\Restaurant\Table\Domain\Exceptions\TableNotExistsException;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;

final class TableFinder
{
    private $repository;

    public function __construct(TableRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(TableId $id): Table
    {
        $consulta = $this->repository->find($id);

        if (null == $consulta) {
            throw new TableNotExistsException($id);
        }

        return $consulta;
    }
}
