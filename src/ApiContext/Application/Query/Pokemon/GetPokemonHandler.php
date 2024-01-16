<?php

namespace Src\ApiContext\Application\Query\Pokemon;

use Src\ApiContext\Domain\Exception\Pokemon\PokemonNotFoundException;
use Src\ApiContext\Domain\Model\Pokemon\PokemonRepository;
use Src\ApiContext\Domain\ModelView\Pokemon\PokemonView;
use Src\ddd\Infrastructure\Application\BusResponse;

class GetPokemonHandler
{
    public function __construct(
        private readonly PokemonRepository $pokemonRepository
    )
    {
    }

    public function __invoke(GetPokemonQuery $query): BusResponse
    {
        $pokemon = $this->pokemonRepository->getPokemon($query->pokedex());
        if (!$pokemon) {
            throw new PokemonNotFoundException();
        }

        return new BusResponse((new PokemonView($pokemon))->toArray());
    }
}
