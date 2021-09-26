<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Domain\ValueObjects;

use Sys\Shared\Domain\ValueObjects\FloatValueObject;

final class ProductPrice extends FloatValueObject
{
    protected $exceptionMessage = "The product price can't be empty";
    protected $exceptionCode = 400;

    public function __construct(float $value)
    {
        $this->notEmpty($value);

        parent::__construct($value);
    }
}
