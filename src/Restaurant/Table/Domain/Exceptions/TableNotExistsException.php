<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Domain\Exceptions;

final class TableNotExistsException extends \Exception
{
    public function __construct(\Sys\Restaurant\Table\Domain\ValueObjects\TableId $id)
    {
        parent::__construct("The table {$id->value()} doesn't exist.");
    }
}
