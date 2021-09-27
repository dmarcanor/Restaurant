<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Create;

use PHPUnit\Framework\MockObject\MockObject;
use Sys\Restaurant\Order\Application\Create\OrderCreator;
use Sys\Restaurant\Order\Domain\Contract\OrderRepository;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Tests\TestCase;
use Tests\Unit\Restaurant\Order\Domain\OrderMother;

final class OrderCreatorTest extends TestCase
{

    /**
     * @test
     */
    public function it_should_create_a_valid_order_and_return_void()
    {
        $request = OrderCreatorRequestMother::random();
        $order = OrderMother::fromRequest($request);

        $repository = $this->createMock(OrderRepository::class);
        $this->shouldSave($repository, $order);

        $response = (new OrderCreator($repository))->__invoke($request);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, Order $order): void
    {
        $repository->method('create')
            ->with($this->equalTo($order));
    }
}
