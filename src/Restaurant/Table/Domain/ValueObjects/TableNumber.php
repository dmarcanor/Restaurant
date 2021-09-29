<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Domain\ValueObjects;

use Sys\Shared\Domain\ValueObjects\IntValueObject;

final class TableNumber extends IntValueObject
{
    protected $exceptionMessage = "The table number can't be empty";
    protected $exceptionCode = 400;

    public function __construct(int $value)
    {
        $this->notEmpty($value);

        parent::__construct($value);
    }
}
