<?php

declare(strict_types=1);

namespace Sys\Restaurant\OrderItem\Domain\Entity;

use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemId;
use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemQuantity;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class OrderItem
{
    private $id;
    private $orderId;
    private $productId;
    private $quantity;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        OrderItemId $id,
        OrderId $orderId,
        ProductId $productId,
        OrderItemQuantity $quantity,
        DateTimeValueObject $createdAt,
        DateTimeValueObject $updatedAt
    )
    {
        $this->id = $id;
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        OrderItemId $id,
        OrderId $orderId,
        ProductId $productId,
        OrderItemQuantity $quantity
    ): self
    {
        return new self(
            $id,
            $orderId,
            $productId,
            $quantity,
            new DateTimeValueObject(),
            new DateTimeValueObject()
        );
    }

    public function id(): OrderItemId
    {
        return $this->id;
    }

    public function orderId(): OrderId
    {
        return $this->orderId;
    }

    public function productId(): ProductId
    {
        return $this->productId;
    }

    public function quantity(): OrderItemQuantity
    {
        return $this->quantity;
    }

    public function createdAt(): DateTimeValueObject
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTimeValueObject
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id'        => $this->id()->value(),
            'orderId'   => $this->orderId()->value(),
            'productId' => $this->productId()->value(),
            'quantity'  => $this->quantity()->value(),
            'createdAt' => $this->createdAt()->value(),
            'updatedAt' => $this->updatedAt()->value()
        ];
    }
}
