<?php

declare(strict_types=1);

namespace Sys\Restaurant\Order\Domain\Service;

use Sys\Restaurant\Order\Domain\Contract\OrderRepository;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Order\Domain\Exceptions\OrderNotExists;
use Sys\Restaurant\Order\Domain\ValueObjects\OrderId;

final class OrderFinder
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OrderId $id): ?Order
    {
        $order = $this->repository->find($id);

        if (null === $order)
            throw new OrderNotExists("There's not any order with the ID {$id->value()}");

        return $order;
    }
}
