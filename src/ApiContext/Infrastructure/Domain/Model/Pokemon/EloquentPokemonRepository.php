<?php

namespace Src\ApiContext\Infrastructure\Domain\Model\Pokemon;

use Src\ApiContext\Domain\Model\Pokemon\Pokemon;
use Src\ApiContext\Domain\Model\Pokemon\PokemonRepository;

class EloquentPokemonRepository implements PokemonRepository
{
    public function getPokemon(int $pokedexNumber): ?Pokemon
    {
        $sql = Pokemon::query()
            ->where(Pokemon::POKEDEX_NUMBER, $pokedexNumber)
            ->with(['types' => function ($query) {
                $query->orderBy('slot', 'asc');
            }]);

        return $sql->get()->first();
    }
}
