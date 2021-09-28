<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Application\Search;

use Sys\Restaurant\Order\Application\Response\OrderResponse;
use Sys\Restaurant\Order\Application\Response\OrdersResponse;
use Sys\Restaurant\Order\Domain\Contract\OrderRepository;
use Sys\Restaurant\Order\Domain\Entity\Order;

final class OrderSearcher
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OrderSearcherRequest $request): OrdersResponse
    {
        return new OrdersResponse(... array_map(
            $this->toResponse(),
            $this->repository->matching($request->filters())
        ));
    }

    private function toResponse(): callable
    {
        return function (Order $order) {
            return new OrderResponse(
                $order->id()->value(),
                $order->code()->value(),
                $order->total()->value(),
                $order->tableId()->value(),
                $order->state()->value(),
                $order->items()->toArray(),
                $order->createdAt()->value(),
                $order->updatedAt()->value()
            );
        };
    }
}
