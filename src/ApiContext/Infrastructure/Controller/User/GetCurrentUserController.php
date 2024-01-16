<?php

namespace Src\ApiContext\Infrastructure\Controller\User;

use Src\ApiContext\Application\Query\User\GetCurrentUserQuery;
use Src\ApiContext\Infrastructure\Controller\BaseController;

class GetCurrentUserController extends BaseController
{
    public function __invoke(): array
    {
        $busResponse = $this->queryBus->handle(
            new GetCurrentUserQuery()
        );

        return $busResponse->data();
    }
}
