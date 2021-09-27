<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Domain\ValueObjects;

use Sys\Shared\Domain\ValueObjects\StringValueObject;

final class OrderState extends StringValueObject
{
    protected $exceptionMessage = "The order state can't be empty";
    protected $exceptionCode = 400;

    public function __construct(string $value)
    {
        $this->notEmpty($value);

        parent::__construct($value);
    }
}
