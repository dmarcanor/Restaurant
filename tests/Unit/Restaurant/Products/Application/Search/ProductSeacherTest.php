<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Search;

use Sys\Restaurant\Products\Domain\Contracts\ProductRepository;
use Sys\Restaurant\Products\Domain\Entity\Product;
use Tests\TestCase;
use Tests\Unit\Restaurant\Products\Application\Response\ProductsResponseMother;
use Tests\Unit\Restaurant\Products\Domain\ProductMother;

final class ProductSeacherTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_find_all_products_by_category()
    {
        $product1 = ProductMother::random();
        $product2 = ProductMother::random();
        $product3 = ProductMother::random();
        $productsResponse = ProductsResponseMother::fromEntities($product1, $product2, $product3);

        $repository = $this->createMock(ProductRepository::class);
        $searcher = new ProductSearcher($repository);

        $this->shouldSearch($repository, $product1, $product2, $product3);

        $this->assertEquals(
            $productsResponse,
            ($searcher)(ProductSearcherRequestMother::byCategory('meal'))
        );
    }

    private function shouldSearch(\PHPUnit\Framework\MockObject\MockObject $repository, Product ...$products)
    {
        $repository->method('matching')
            ->willReturn($products);
    }
}
