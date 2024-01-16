<?php

namespace App\Http\Controllers\PokeApiContext\User;

use App\Http\Requests\PokeApiContext\User\CreateUserRequest;
use Src\ApiContext\Infrastructure\Controller\BaseController;

class CreateUserController extends BaseController
{
    public function __construct(
        private readonly \Src\ApiContext\Infrastructure\Controller\User\CreateUserController $controller
    )
    {
    }

    public function __invoke(CreateUserRequest $request)
    {
        return response($this->controller->__invoke($request->validated()), 200);
    }
}
