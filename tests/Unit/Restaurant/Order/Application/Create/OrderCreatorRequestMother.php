<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Order\Application\Create;

use Sys\Restaurant\Order\Application\Create\OrderCreatorRequest;
use Tests\Unit\Restaurant\OrderItems\Domain\OrderItemsMother;
use Tests\Unit\Restaurant\Table\Domain\TableIdMother;
use Tests\Unit\Restaurant\Order\Domain\OrderCodeMother;
use Tests\Unit\Restaurant\Order\Domain\OrderIdMother;
use Tests\Unit\Restaurant\Order\Domain\OrderStateMother;
use Tests\Unit\Restaurant\Order\Domain\OrderTotalMother;

final class OrderCreatorRequestMother
{
    public static function random(): OrderCreatorRequest
    {
        return new OrderCreatorRequest(
            OrderIdMother::random()->value(),
            OrderCodeMother::random()->value(),
            OrderTotalMother::random()->value(),
            TableIdMother::random()->value(),
            OrderStateMother::random()->value(),
            OrderItemsMother::random()->toArray()
        );
    }
}
