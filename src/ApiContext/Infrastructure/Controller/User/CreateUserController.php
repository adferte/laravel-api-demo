<?php

namespace Src\ApiContext\Infrastructure\Controller\User;

use Illuminate\Support\Facades\Hash;
use Src\ApiContext\Application\Command\User\CreateUserCommand;
use Src\ApiContext\Infrastructure\Controller\BaseController;

class CreateUserController extends BaseController
{
    public function __invoke($request): array
    {
        $name = $request['name'];
        $email = $request['email'];
        $password = Hash::make($request['password']);

        $this->commandBus->handle(
            new CreateUserCommand($name, $email, $password)
        );

        return [];
    }
}
