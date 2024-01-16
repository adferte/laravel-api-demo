<?php

namespace Src\ApiContext\Infrastructure\Controller\Pokemon;

use Src\ApiContext\Application\Query\Pokemon\GetPokemonQuery;
use Src\ApiContext\Infrastructure\Controller\BaseController;

class GetPokemonController extends BaseController
{
    public function __invoke($request): array
    {
        $pokedexNumber = (int)$request['pokedex'];

        $busResponse = $this->queryBus->handle(
            new GetPokemonQuery($pokedexNumber)
        );

        return $busResponse->data();
    }

}
