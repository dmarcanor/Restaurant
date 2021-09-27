<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Application\Update;

use Sys\Restaurant\Order\Domain\Contract\OrderRepository;
use Sys\Restaurant\Order\Domain\Service\OrderFinder;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderCode;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderState;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderTotal;
use Sys\Restaurant\OrderItem\Domain\Entity\OrderItems;
use Sys\Restaurant\Table\Domain\ValueObjects\TableId;

final class OrderUpdater
{
    private $finder;
    private $repository;

    public function __construct(
        OrderRepository $repository
    )
    {
        $this->finder = new OrderFinder($repository);
        $this->repository = $repository;
    }

    public function __invoke(OrderUpdaterRequest $request): void
    {
        $order = ($this->finder)(new OrderId($request->id()));

        $order->changeCode(new OrderCode($request->code()));
        $order->changeTotal(new OrderTotal($request->total()));
        $order->changeTableId(new TableId($request->tableId()));
        $order->changeState(new OrderState($request->state()));
//        $order->changeItems(new OrderItems($request->items()));

        $this->repository->update($order);
    }
}
