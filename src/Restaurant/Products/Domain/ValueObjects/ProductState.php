<?php

declare(strict_types=1);

namespace Sys\Restaurant\Products\Domain\ValueObjects;

use Sys\Shared\Domain\ValueObjects\StringValueObject;

final class ProductState extends StringValueObject
{
    protected $exceptionMessage = "The product state can't be empty";
    protected $exceptionCode = 400;

    public function __construct(string $value)
    {
        $this->notEmpty($value);

        parent::__construct($value);
    }
}
