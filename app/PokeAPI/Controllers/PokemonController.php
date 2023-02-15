<?php

namespace App\PokeAPI\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use App\PokeAPI\Requests\PokemonRequest;
use App\PokeAPI\Resources\PokemonResource;

class PokemonController extends Controller
{
    public function get(PokemonRequest $request)
    {
        $query = Pokemon::query();
        $validatedData = $request->validated();

        if ($validatedData) {
            if (isset($validatedData[PokemonRequest::ID])) {
                $query->where(Pokemon::ID, $validatedData[PokemonRequest::ID]);
            }
            else if (isset($validatedData[PokemonRequest::POKEDEX])) {
                $query->where(Pokemon::POKEDEX_NUMBER, $validatedData[PokemonRequest::POKEDEX]);
            }
        }
        return PokemonResource::collection($query->get());
    }
}
