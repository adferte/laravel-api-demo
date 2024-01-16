<?php

namespace Src\ApiContext\Infrastructure\Domain\Model\User;

use Src\ApiContext\Domain\Model\User\User;
use Src\ApiContext\Domain\Model\User\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function createUser(User $user): void
    {
        $user->save();
    }

    public function getUser(string $usedId): User
    {
        return User::find($usedId);
    }
}
