<?php

declare(strict_types=1);

namespace Sys\Restaurant\OrderItem\Domain\ValueObjects;

use Sys\Shared\Domain\ValueObjects\FloatValueObject;

final class OrderItemQuantity extends FloatValueObject
{
    protected $exceptionMessage = "The order item quantity can't be empty";
    protected $exceptionCode = 400;

    public function __construct(float $value)
    {
        $this->notEmpty($value);

        parent::__construct($value);
    }
}
