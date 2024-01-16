<?php

namespace Tests\ApiContext\Application\Query\Type;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Src\ApiContext\Application\Query\Type\GetTypesHandler;
use Src\ApiContext\Application\Query\Type\GetTypesQuery;
use Src\ApiContext\Domain\ModelView\Type\TypeView;
use Tests\ApiContext\ApiContextUnitTestCase;

class GetTypesHandlerTest extends ApiContextUnitTestCase
{
    use DatabaseTransactions;

    public GetTypesHandler $handler;

    public function setUp(): void
    {
        parent::setUp();
        $this->handler = $this->getTypesHandler();
    }

    public function test_should_get_all_types(): void
    {
        $busResponse = $this->handler->__invoke(new GetTypesQuery());
        $response = $busResponse->data();

        $this->assertCount(config('pokeApi.type_limit'), $response);
        foreach ($response as $type) {
            $this->assertArrayHasKey('id', $type);

            $databaseType = $this->typeRepository()->getType($type['id']);
            $this->assertNotNull($databaseType);
            $typeView = new TypeView($databaseType);

            $this->assertEquals($typeView->id(), $type['id']);
            $this->assertArrayHasKey('name', $type);
            $this->assertEquals($typeView->name(), $type['name']);
        }
    }
}
