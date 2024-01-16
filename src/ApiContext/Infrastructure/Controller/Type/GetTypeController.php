<?php

namespace Src\ApiContext\Infrastructure\Controller\Type;

use Src\ApiContext\Application\Query\Type\GetTypesQuery;
use Src\ApiContext\Infrastructure\Controller\BaseController;

class GetTypeController extends BaseController
{
    public function __invoke(): array
    {
        $busResponse = $this->queryBus->handle(
            new GetTypesQuery()
        );

        return $busResponse->data();
    }
}
