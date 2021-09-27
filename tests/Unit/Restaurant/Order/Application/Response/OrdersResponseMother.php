<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Response;

use Sys\Restaurant\Order\Application\Response\OrderResponse;
use Sys\Restaurant\Order\Application\Response\OrdersResponse;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Products\Domain\Entity\Product;

final class OrdersResponseMother
{
    public static function create(OrderResponse ...$orders): OrdersResponse
    {
        return new OrdersResponse(
            ...$orders
        );
    }

    public  static function fromEntities(Order ...$orders): OrdersResponse
    {
        $arrayResponse = [];

        foreach ($orders as $order) {
            $arrayResponse[] = OrderResponseMother::fromEntity($order);
        }

        return self::create(
            ...$arrayResponse
        );
    }

    public static function ByState(string $state, Order ...$orders): OrdersResponse
    {
        $onlyActives = array_filter($orders, function (Order $order) use ($state) {
            return $order->state()->value() === $state;
        });

        $arrayResponse = array_map(function (Order $order) {
            return OrderResponseMother::fromEntity($order);
        }, $onlyActives);

        return self::create(
            ...$arrayResponse
        );
    }
}
