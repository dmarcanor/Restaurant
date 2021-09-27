<?php

declare(strict_types=1);

namespace Sys\Restaurant\OrderItem\Domain\Entity;

use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemId;
use Sys\Restaurant\OrderItem\Domain\ValueObjects\OrderItemQuantity;
use Sys\Restaurant\Products\Domain\ValueObjects\ProductId;
use Sys\Shared\Domain\Collection;
use Sys\Shared\Domain\ValueObjects\DateTimeValueObject;

final class OrderItems extends Collection
{
    public static function create(array $values): self
    {
        $orderItems = array_map(function ($item) {
            return OrderItem::create(
                new OrderItemId($item['id']),
                new OrderId($item['orderId']),
                new ProductId($item['productId']),
                new OrderItemQuantity($item['quantity']),
            );
        }, $values);

        return new self($orderItems);
    }

    public static function fromValues(array $values): self
    {
        $orderItems = array_map(function ($item) {
            return new OrderItem(
                new OrderItemId($item['id']),
                new OrderId($item['orderId']),
                new ProductId($item['productId']),
                new OrderItemQuantity($item['quantity']),
                new DateTimeValueObject($item['createdAt']),
                new DateTimeValueObject($item['updatedAt'])
            );
        }, $values);

        return new self($orderItems);
    }

    public function toArray(): array
    {
        return array_map(function (OrderItem $item) {
            return $item->toArray();
        }, $this->items());
    }

    public function rows(): array
    {
        return $this->items();
    }

    protected function type(): string
    {
        return OrderItem::class;
    }
}
