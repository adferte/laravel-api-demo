<?php

namespace Src\ApiContext\Domain\ModelView\Pokemon;

use Src\ApiContext\Domain\Model\Pokemon\Pokemon;
use Src\ApiContext\Domain\ModelView\Type\TypeView;

class PokemonView
{
    public function __construct(
        private readonly Pokemon $pokemon,
    )
    {
    }

    public function types()
    {
        $types = [];
        foreach ($this->pokemon->types as $type) {
            $types[] = (new TypeView($type))->toArray();
        }
        return $types;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'pokedex' => $this->pokedexNumber(),
            'name' => $this->name(),
            'image' => $this->image(),
            'types' => $this->types(),
        ];
    }

    public function id()
    {
        return $this->pokemon->{Pokemon::ID};
    }

    public function pokedexNumber()
    {
        return $this->pokemon->{Pokemon::POKEDEX_NUMBER};
    }

    public function name()
    {
        return ucfirst($this->pokemon->{Pokemon::NAME});
    }

    public function image()
    {
        return $this->pokemon->{Pokemon::IMAGE};
    }
}
