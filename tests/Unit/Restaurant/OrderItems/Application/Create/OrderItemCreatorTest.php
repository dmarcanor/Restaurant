<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\OrderItems\Application\Create;

use PHPUnit\Framework\MockObject\MockObject;
use Sys\Restaurant\OrderItem\Application\Create\OrderItemCreator;
use Sys\Restaurant\OrderItem\Domain\Contracts\OrderItemRepository;
use Sys\Restaurant\OrderItem\Domain\Entity\OrderItem;
use Tests\TestCase;
use Tests\Unit\Restaurant\OrderItems\Domain\OrderItemMother;

final class OrderItemCreatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_create_a_valid_order_item_and_return_null()
    {
        $orderItem = OrderItemMother::random();

        $repository = $this->createMock(OrderItemRepository::class);
        $this->shouldSave($repository, $orderItem);

        $response = (new OrderItemCreator($repository))->__invoke($orderItem);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, OrderItem $orderItem): void
    {
        $repository->method('create')
            ->with($this->equalTo($orderItem));
    }
}
