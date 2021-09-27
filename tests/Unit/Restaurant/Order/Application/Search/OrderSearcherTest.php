<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Search;

use Sys\Restaurant\Order\Application\Search\OrderSearcher;
use Sys\Restaurant\Order\Domain\Contract\OrderRepository;
use Sys\Restaurant\Order\Domain\Entity\Order;
use Sys\Restaurant\Products\Application\Seach\ProductSearcher;
use Tests\TestCase;
use Tests\Unit\Restaurant\Order\Application\Response\OrdersResponseMother;
use Tests\Unit\Restaurant\Order\Domain\OrderMother;

final class OrderSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_find_all_products_by_state_activo()
    {
        $order1 = OrderMother::random();
        $order2 = OrderMother::random();
        $order3 = OrderMother::withState('active');
        $productsResponse = OrdersResponseMother::byState('active', $order1, $order2, $order3);

        $repository = $this->createMock(OrderRepository::class);
        $searcher = new OrderSearcher($repository);

        $this->shouldSearchByState($repository, 'active', $order1, $order2, $order3);

        $this->assertEquals(
            $productsResponse,
            ($searcher)(OrderSearcherRequestMother::byState('active'))
        );
    }

    private function shouldSearch(\PHPUnit\Framework\MockObject\MockObject $repository, Order ...$orders)
    {
        $repository->method('matching')
            ->willReturn($orders);
    }

    private function shouldSearchByState(\PHPUnit\Framework\MockObject\MockObject $repository, string $state, Order ...$orders)
    {
        $onlyActives = array_filter($orders, function ($order) use ($state) {
            return $order->state()->value() === $state;
        });

        $repository->method('matching')
            ->willReturn($onlyActives);
    }
}
