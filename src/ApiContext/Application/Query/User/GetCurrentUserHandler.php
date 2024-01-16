<?php

namespace Src\ApiContext\Application\Query\User;

use Illuminate\Support\Facades\Auth;
use Src\ApiContext\Domain\Exception\User\UserNotFoundException;
use Src\ApiContext\Domain\Model\User\UserRepository;
use Src\ApiContext\Domain\ModelView\UserView\UserView;
use Src\ddd\Infrastructure\Application\BusResponse;

class GetCurrentUserHandler
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function __invoke(GetCurrentUserQuery $query): BusResponse
    {
        $userId = Auth::id();
        if (!$userId) {
            throw new UserNotFoundException();
        }
        $user = $this->userRepository->getUser($userId);
        if (!$user) {
            throw new UserNotFoundException();
        }

        return new BusResponse((new UserView($user))->toArray());
    }
}
