<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Update;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\MockObject\MockObject;
use Sys\Restaurant\Products\Application\Update\ProductUpdater;
use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Tests\TestCase;
use Tests\Unit\Restaurant\Products\Domain\ProductMother;

final class ProductUpdaterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_should_update_a_valid_product()
    {
        $product = ProductMother::random();
        $request = ProductUpdaterRequestMother::withId($product->id()->value());

        $repository = $this->createMock(ProductRepository::class);
        $this->shouldFind($repository, $product);
        $this->shouldSave($repository, $product);

        $response = (new ProductUpdater($repository))->__invoke($request);

        $this->assertNull($response);
    }

    private function shouldSave(MockObject $repository, Product $product): void
    {
        $repository->method('update')
            ->with($this->equalTo($product));
    }

    private function shouldFind(MockObject $repository, Product $product): void
    {
        $repository->method('find')
            ->with($this->equalTo($product->id()))
            ->willReturn($product);
    }
}
