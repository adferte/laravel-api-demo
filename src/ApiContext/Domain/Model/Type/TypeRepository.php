<?php

namespace Src\ApiContext\Domain\Model\Type;

interface TypeRepository
{
    /** @return Type[] */
    public function getAllTypes(): array;
}
