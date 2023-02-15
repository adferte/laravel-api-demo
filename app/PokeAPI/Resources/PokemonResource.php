<?php

namespace App\PokeAPI\Resources;

use App\Models\Pokemon;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->{Pokemon::ID},
            'pokedex' => $this->{Pokemon::POKEDEX_NUMBER},
            'name' => ucfirst($this->{Pokemon::NAME}),
            'image' => $this->{Pokemon::IMAGE},
        ];
    }
}

