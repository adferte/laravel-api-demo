<?php

namespace Src\ApiContext\Domain\Model\User;

interface UserRepository
{
    public function createUser(User $user): void;

    public function getUser(string $usedId): ?User;

    public function getUserByEmail(string $email): ?User;

    /** @return User[] */
    public function getAll(): array;

    public function first(): ?User;
}
