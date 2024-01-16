<?php

namespace Src\ApiContext\Infrastructure\Controller;

use Src\ddd\Infrastructure\Application\ICommandBus;
use Src\ddd\Infrastructure\Application\IQueryBus;

class BaseController
{
    public function __construct(
        protected readonly ICommandBus $commandBus,
        protected readonly IQueryBus $queryBus,
    )
    {
    }
}
