<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Products\Application\Search;

use Sys\Restaurant\Products\Application\Seach\ProductSearcher;
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
    public function it_should_find_all_products_by_category_platillo()
    {
        $product1 = ProductMother::random();
        $product2 = ProductMother::random();
        $product3 = ProductMother::withCategory('platillo');
        $productsResponse = ProductsResponseMother::byCategory('platillo', $product1, $product2, $product3);

        $repository = $this->createMock(ProductRepository::class);
        $searcher = new ProductSearcher($repository);

        $this->shouldSearchByCategory($repository, 'platillo', $product1, $product2, $product3);

        $this->assertEquals(
            $productsResponse,
            ($searcher)(ProductSearcherRequestMother::byCategory('platillo'))
        );
    }

    private function shouldSearch(\PHPUnit\Framework\MockObject\MockObject $repository, Product ...$products)
    {
        $repository->method('matching')
            ->willReturn($products);
    }

    private function shouldSearchByCategory(\PHPUnit\Framework\MockObject\MockObject $repository, string $category, Product ...$products)
    {
        $onlyPlatillos = array_filter($products, function ($product) use ($category) {
            return $product->category()->value() === $category;
        });

        $repository->method('matching')
            ->willReturn($onlyPlatillos);
    }
}
