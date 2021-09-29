<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Application\Search;

use Sys\Restaurant\Table\Application\Search\TableSearcher;
use Sys\Restaurant\Table\Domain\Contracts\TableRepository;
use Sys\Restaurant\Table\Domain\Entity\Table;
use Tests\TestCase;
use Tests\Unit\Restaurant\Table\Application\Response\TablesResponseMother;
use Tests\Unit\Restaurant\Table\Domain\TableMother;

final class TableSearcherTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_find_all_available_tables()
    {
        $table1 = TableMother::random();
        $table2 = TableMother::random();
        $table3 = TableMother::withState('available');
        $tablesResponse = TablesResponseMother::byState('available', $table1, $table2, $table3);

        $repository = $this->createMock(TableRepository::class);
        $searcher = new TableSearcher($repository);

        $this->shouldSearchByState($repository, 'available', $table1, $table2, $table3);

        $this->assertEquals(
            $tablesResponse,
            ($searcher)(TableSearcherRequestMother::byState('available'))
        );
    }

    private function shouldSearch(\PHPUnit\Framework\MockObject\MockObject $repository, Table ...$tables)
    {
        $repository->method('matching')
            ->willReturn($tables);
    }

    private function shouldSearchByState(\PHPUnit\Framework\MockObject\MockObject $repository, string $state, Table ...$tables)
    {
        $availableOnly = array_filter($tables, function ($table) use ($state) {
            return $table->state()->value() === $state;
        });

        $repository->method('matching')
            ->willReturn($availableOnly);
    }
}
