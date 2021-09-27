<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Domain\Contract;

use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;

interface OrderRepository
{
    public function create(Order $order): void;

    public function update(Order $order): void;

    public function find(OrderId $id): ?Order;
}
