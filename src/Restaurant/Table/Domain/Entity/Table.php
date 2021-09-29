<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Domain\Entity;

use Sys\Restaurant\Table\Domain\ValueObjects\TableId;
use Sys\Restaurant\Table\Domain\ValueObjects\TableNumber;
use Sys\Restaurant\Table\Domain\ValueObjects\TableQR;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class Table
{
    private $id;
    private $number;
    private $QR;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        TableId $id,
        TableNumber $number,
        TableQR $QR,
        DateTimeValueObject $createdAt,
        DateTimeValueObject $updatedAt
    )
    {
        $this->id = $id;
        $this->number = $number;
        $this->QR = $QR;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        TableId $id,
        TableNumber $number,
        TableQR $QR
    ): self
    {
        return new self(
            $id,
            $number,
            $QR,
            new DateTimeValueObject(),
            new DateTimeValueObject()
        );
    }

    public function id(): TableId
    {
        return $this->id;
    }

    public function number(): TableNumber
    {
        return $this->number;
    }

    public function QR(): TableQR
    {
        return $this->QR;
    }

    public function createdAt(): DateTimeValueObject
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTimeValueObject
    {
        return $this->updatedAt;
    }
}
