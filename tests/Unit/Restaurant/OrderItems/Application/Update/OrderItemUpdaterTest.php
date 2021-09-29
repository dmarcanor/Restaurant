<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\OrderItems\Application\Update;

use PHPUnit\Framework\MockObject\MockObject;
use Sys\Restaurant\OrderItem\Application\Update\OrderItemUpdater;
use Sys\Restaurant\OrderItem\Domain\Contracts\OrderItemRepository;
use Sys\Restaurant\OrderItem\Domain\Entity\OrderItem;
use Tests\TestCase;
use Tests\Unit\Restaurant\OrderItems\Domain\OrderItemMother;

final class OrderItemUpdaterTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_update_an_existing_order_item()
    {
        $orderItem = OrderItemMother::random();
        $orderItemChanged = OrderItemMother::withId($orderItem->id()->value());

        $repository = $this->createMock(OrderItemRepository::class);
        $this->shouldSave($repository, $orderItemChanged);

        $response = (new OrderItemUpdater($repository))->__invoke($orderItemChanged);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, OrderItem $orderItem): void
    {
        $repository->method('update')
            ->with($this->equalTo($orderItem));
    }
}
