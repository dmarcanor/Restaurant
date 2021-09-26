<?php

declare(strict_types=1);

namespace Sys\Shared\Domain\ValueObjects;

use Sys\Shared\Domain\Exceptions\EmptyArgumentException;

class BoolValueObject
{
    private $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }

    public function equals(self $newValue): bool
    {
        return $this->value === $newValue->value();
    }
}
