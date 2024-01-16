<?php

namespace Src\ApiContext\Domain\Model\Pokemon;

interface PokemonRepository
{
    public function getPokemon(int $pokedexNumber): ?Pokemon;
}
