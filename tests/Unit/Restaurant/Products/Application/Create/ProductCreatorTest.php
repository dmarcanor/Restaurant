<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Create;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\MockObject\MockObject;
use Sys\Restaurant\Products\Application\Create\ProductCreator;
use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Tests\TestCase;
use Tests\Unit\Restaurant\Products\Domain\ProductMother;

final class ProductCreatorTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_should_create_a_valid_product()
    {
        $request = ProductCreatorRequestMother::random();
        $product = ProductMother::fromRequest($request);

        $repository = $this->createMock(ProductRepository::class);
        $this->shouldSave($repository, $product);

        $response = (new ProductCreator($repository))->__invoke($request);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, Product $product): void
    {
        $repository->method('create')
            ->with($this->equalTo($product));
    }
}
