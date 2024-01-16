<?php

namespace Src\ApiContext\Application\Command\User;

use Ramsey\Uuid\Uuid;
use Src\ApiContext\Domain\Exception\User\UserEmailInUseException;
use Src\ApiContext\Domain\Model\User\User;
use Src\ApiContext\Domain\Model\User\UserRepository;

class CreateUserHandler
{
    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $userWithSameEmail = $this->userRepository->getUserByEmail($command->email());
        if ($userWithSameEmail) {
            throw new UserEmailInUseException();
        }

        $user = new User();
        $user->{User::ID} = Uuid::uuid4();
        $user->{User::NAME} = $command->name();
        $user->{User::EMAIL} = $command->email();
        $user->{User::PASSWORD} = $command->password();

        $this->userRepository->createUser($user);
    }
}
