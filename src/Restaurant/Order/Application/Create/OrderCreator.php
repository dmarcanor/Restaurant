<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Application\Create;

use Sys\Restaurant\Order\Domain\Contract\OrderRepository;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderCode;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderState;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderTotal;
use Sys\Restaurant\OrderItem\Domain\Entity\OrderItems;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;

final class OrderCreator
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OrderCreatorRequest $request): void
    {
        $order = Order::create(
            new OrderId($request->id()),
            new OrderCode($request->code()),
            new OrderTotal($request->total()),
            new TableId($request->tableId()),
            new OrderState($request->state()),
            OrderItems::create($request->items())
        );

        $this->repository->create($order);
    }
}
