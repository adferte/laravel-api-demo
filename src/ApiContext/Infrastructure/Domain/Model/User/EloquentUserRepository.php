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

    public function getUser(string $usedId): ?User
    {
        return User::find($usedId);
    }

    public function getUserByEmail(string $email): ?User
    {
        return User::where(User::EMAIL, $email)->first();
    }

    public function first(): ?User
    {
        return User::all()->first();
    }

    public function getAll(): array
    {
        $usersData = User::all();
        $users = [];
        foreach ($usersData as $user) {
            $users[] = $user;
        }
        return $users;
    }
}
