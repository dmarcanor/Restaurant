<?php

declare(strict_types=1);

namespace Tests\Unit\Restaurant\Table\Application\Find;

use Sys\Restaurant\Table\Application\Find\TableFinder;
use Sys\Restaurant\Table\Domain\Contracts\TableRepository;
use Tests\TestCase;
use Tests\Unit\Restaurant\Table\Application\Response\TableResponseMother;
use Tests\Unit\Restaurant\Table\Domain\TableMother;

final class TableFinderTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_find_an_existing_table()
    {
        $table = TableMother::random();
        $tableResponse = TableResponseMother::fromEntity($table);

        $repository = $this->createMock(TableRepository::class);
        $this->shouldFind($repository, $table);

        $finder = new TableFinder($repository);

        $this->assertEquals(
            $tableResponse,
            ($finder)(TableFinderRequestMother::create($table->id()->value()))
        );
    }

    private function shouldFind(\PHPUnit\Framework\MockObject\MockObject $repository, \Sys\Restaurant\Table\Domain\Entity\Table $table)
    {
        $repository->method('find')
            ->with($this->equalTo($table->id()))
            ->willReturn($table);
    }
}
