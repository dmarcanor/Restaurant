<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Application\Search;

use Sys\Restaurant\Table\Application\Response\TableResponse;
use Sys\Restaurant\Table\Application\Response\TablesResponse;
use Sys\Restaurant\Table\Domain\Contracts\TableRepository;
use Sys\Restaurant\Table\Domain\Entity\Table;

final class TableSearcher
{
    private $repository;

    public function __construct(TableRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(TableSearcherRequest $request): TablesResponse
    {
        return new TablesResponse(... array_map(
            $this->toResponse(),
            $this->repository->matching($request->filters())
        ));
    }

    private function toResponse(): callable
    {
        return function (Table $table) {
            return new TableResponse(
                $table->id()->value(),
                $table->number()->value(),
                $table->QR()->value(),
                $table->state()->value(),
                $table->createdAt()->value(),
                $table->updatedAt()->value()
            );
        };
    }
}
