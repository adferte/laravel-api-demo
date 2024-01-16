<?php

namespace App\Http\Controllers\PokeApiContext\User;

use App\Http\Controllers\BaseController;

class GetCurrentUserController extends BaseController
{
    public function __construct(
        private readonly \Src\ApiContext\Infrastructure\Controller\User\GetCurrentUserController $controller
    )
    {
    }

    public function __invoke()
    {
        return response($this->controller->__invoke(), 200);
    }
}
