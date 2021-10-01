<?php

declare(strict_types=1);

namespace Sys\Restaurant\Table\Domain\Entity;

use Sys\Restaurant\Table\Domain\ValueObjects\TableId;
use Sys\Restaurant\Table\Domain\ValueObjects\TableNumber;
use Sys\Restaurant\Table\Domain\ValueObjects\TableQR;
use Sys\Restaurant\Table\Domain\ValueObjects\TableState;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class Table
{
    const TABLE = 'tables';

    private $id;
    private $number;
    private $QR;
    private $state;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        TableId $id,
        TableNumber $number,
        TableQR $QR,
        TableState $state,
        DateTimeValueObject $createdAt,
        DateTimeValueObject $updatedAt
    )
    {
        $this->id = $id;
        $this->number = $number;
        $this->QR = $QR;
        $this->state = $state;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        TableId $id,
        TableNumber $number,
        TableQR $QR,
        TableState $state
    ): self
    {
        return new self(
            $id,
            $number,
            $QR,
            $state,
            new DateTimeValueObject(),
            new DateTimeValueObject()
        );
    }

    public static function fromValues(
        string $id,
        int $number,
        string $QR,
        string $state,
        string $createdAt,
        string $updatedAt
    ): Table
    {
        return new self(
            new TableId($id),
            new TableNumber($number),
            new TableQR($QR),
            new TableState($state),
            new DateTimeValueObject($createdAt),
            new DateTimeValueObject($updatedAt)
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

    public function state(): TableState
    {
        return $this->state;
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
