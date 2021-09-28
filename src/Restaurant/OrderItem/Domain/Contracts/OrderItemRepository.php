<?php

declare(strict_types=1);

namespace Sys\Restaurant\OrderItem\Domain\Contracts;

use Sys\Restaurant\OrderItem\Domain\Entity\OrderItem;

interface OrderItemRepository
{
    public function create(OrderItem $orderItem): void;
}
