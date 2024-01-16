<?php

namespace App\Http\Controllers\PokeApiContext\Type;

use App\Http\Controllers\BaseController;

class GetTypeController extends BaseController
{
    public function __construct(
        private readonly \Src\ApiContext\Infrastructure\Controller\Type\GetTypeController $controller
    )
    {
    }

    public function __invoke()
    {
        return response($this->controller->__invoke(), 200);
    }
}
