<?php

namespace Src\ApiContext\Infrastructure\Domain\Model\Type;

use Src\ApiContext\Domain\Model\Type\Type;
use Src\ApiContext\Domain\Model\Type\TypeRepository;

class EloquentTypeRepository implements TypeRepository
{
    /**
     * @inheritDoc
     */
    public function getAllTypes(): array
    {
        $typesData = Type::all();
        $types = [];
        foreach ($typesData as $type) {
            $types[] = $type;
        }
        return $types;
    }

    public function getType(string $id): ?Type
    {
        return Type::find($id);
    }
}
