<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Domain\ValueObjects;

use Sys\Shared\Domain\ValueObjects\FloatValueObject;

final class OrderTotal extends FloatValueObject
{
    protected $exceptionMessage = "The order total can't be empty";
    protected $exceptionCode = 400;

    public function __construct(float $value)
    {
        $this->notEmpty($value);

        parent::__construct($value);
    }
}
