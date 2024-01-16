<?php

namespace Src\ApiContext\Domain\Model\User;

interface UserRepository
{
    public function createUser(User $user): void;

    public function getUser(string $usedId): User;
}
