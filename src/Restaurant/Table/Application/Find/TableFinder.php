<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Application\Find;

use Sys\Restaurant\Table\Application\Response\TableResponse;
use Sys\Restaurant\Table\Domain\Contracts\TableRepository;
use Sys\Restaurant\Table\Domain\Services\TableFinder as Finder;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;

final class TableFinder
{
    private $finder;
    private $repository;

    public function __construct(TableRepository $repository)
    {
        $this->finder = new Finder($repository);
        $this->repository = $repository;
    }

    public function __invoke(TableFinderRequest $request): TableResponse
    {
        $table = ($this->finder)(new TableId($request->id()));

        return new TableResponse(
            $table->id()->value(),
            $table->number()->value(),
            $table->QR()->value(),
            $table->createdAt()->value(),
            $table->updatedAt()->value()
        );
    }
}
