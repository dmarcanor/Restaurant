<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Update;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\MockObject\MockObject;
use Sys\Restaurant\Order\Application\Update\OrderUpdater;
use Sys\Restaurant\Order\Domain\Contract\OrderRepository;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Products\Application\Update\ProductUpdater;
use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Tests\TestCase;
use Tests\Unit\Restaurant\Order\Domain\OrderMother;
use Tests\Unit\Restaurant\Products\Domain\ProductMother;

final class OrderUpdaterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_should_update_a_valid_product_and_return_null()
    {
        $order = OrderMother::random();
        $request = OrderUpdaterRequestMother::withId($order->id()->value());

        $repository = $this->createMock(OrderRepository::class);
        $this->shouldFind($repository, $order);
        $this->shouldSave($repository, $order);

        $response = (new OrderUpdater($repository))->__invoke($request);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, Order $order): void
    {
        $repository->method('update')
            ->with($this->equalTo($order));
    }

    private function shouldFind(MockObject $repository, Order $order): void
    {
        $repository->method('find')
            ->with($this->equalTo($order->id()))
            ->willReturn($order);
    }
}
