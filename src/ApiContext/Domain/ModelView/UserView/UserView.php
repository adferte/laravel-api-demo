<?php

namespace Src\ApiContext\Domain\ModelView\UserView;

use Src\ApiContext\Domain\Model\User\User;

class UserView
{
    public function __construct(
        private readonly User $user,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'email' => $this->email(),
        ];
    }

    public function id()
    {
        return $this->user->{User::ID};
    }

    public function name()
    {
        return ucfirst($this->user->{User::NAME});
    }

    public function email()
    {
        return ucfirst($this->user->{User::NAME});
    }
}
