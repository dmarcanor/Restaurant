<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Application\Response;

final class OrdersResponse
{
    private $orders;

    public function __construct(OrderResponse ...$orders)
    {
        $this->orders = $orders;
    }

    public function orders(): array
    {
        return $this->orders;
    }
}
