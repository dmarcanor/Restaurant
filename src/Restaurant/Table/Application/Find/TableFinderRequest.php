<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Application\Find;

final class TableFinderRequest
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}
