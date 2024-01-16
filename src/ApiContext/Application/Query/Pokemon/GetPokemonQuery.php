<?php

namespace Src\ApiContext\Application\Query\Pokemon;

class GetPokemonQuery
{
    public function __construct(
        private readonly int $pokedex,
    )
    {
    }

    public function pokedex(): int
    {
        return $this->pokedex;
    }
}
