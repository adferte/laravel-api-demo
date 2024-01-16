<?php

namespace Src\ApiContext\Domain\ModelView\Type;

use Src\ApiContext\Domain\Model\Type\Type;

class TypeView
{
    public function __construct(
        private readonly Type $type,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
        ];
    }

    public function id()
    {
        return $this->type->{Type::ID};
    }

    public function name()
    {
        return ucfirst($this->type->{Type::NAME});
    }
}
