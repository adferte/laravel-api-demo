<?php

namespace Src\ApiContext\Application\Query\User;

use Illuminate\Support\Facades\Auth;
use Src\ApiContext\Application\Query\Type\GetTypesQuery;
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

    public function __invoke(GetTypesQuery $query)
    {
        $currentUserId = Auth::id();
        $user = $this->userRepository->getUser($currentUserId);

        return new BusResponse((new UserView($user))->toArray());
    }
}
