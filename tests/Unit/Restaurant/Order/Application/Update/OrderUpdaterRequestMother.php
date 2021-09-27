<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Update;

use Sys\Restaurant\Order\Application\Update\OrderUpdaterRequest;
use Tests\Unit\Restaurant\Order\Domain\OrderCodeMother;
use Tests\Unit\Restaurant\Order\Domain\OrderIdMother;
use Tests\Unit\Restaurant\Order\Domain\OrderStateMother;
use Tests\Unit\Restaurant\Order\Domain\OrderTotalMother;
use Tests\Unit\Restaurant\OrderItems\Domain\OrderItemMother;
use Tests\Unit\Restaurant\OrderItems\Domain\OrderItemsMother;
use Tests\Unit\Restaurant\Table\Domain\TableIdMother;

final class OrderUpdaterRequestMother
{
    public static function withId(string $id): OrderUpdaterRequest
    {
        return new OrderUpdaterRequest(
            OrderIdMother::create($id)->value(),
            OrderCodeMother::random()->value(),
            OrderTotalMother::random()->value(),
            TableIdMother::random()->value(),
            OrderStateMother::random()->value(),
            OrderItemsMother::random()->toArray()
        );
    }
}
