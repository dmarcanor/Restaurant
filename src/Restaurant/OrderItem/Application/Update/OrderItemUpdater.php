<?php

declare(strict_types=1);

namespace Sys\Restaurant\OrderItem\Application\Update;

use Sys\Restaurant\OrderItem\Domain\Contracts\OrderItemRepository;
use Sys\Restaurant\OrderItem\Domain\Entity\OrderItem;

final class OrderItemUpdater
{
    private $repository;

    public function __construct(OrderItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OrderItem $orderItem)
    {
        $this->repository->update($orderItem);
    }
}
