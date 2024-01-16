<?php

namespace Src\ApiContext\Application\Query\Type;

use Src\ApiContext\Domain\Model\Type\TypeRepository;
use Src\ApiContext\Domain\ModelView\Type\TypeView;
use Src\ddd\Infrastructure\Application\BusResponse;

class GetTypesHandler
{
    public function __construct(
        private readonly TypeRepository $typeRepository
    )
    {
    }

    public function __invoke(GetTypesQuery $query): BusResponse
    {
        $types = $this->typeRepository->getAllTypes();
        $typesArr = [];
        foreach ($types as $type) {
            $typesArr[] = (new TypeView($type))->toArray();
        }

        return new BusResponse($typesArr);
    }
}
