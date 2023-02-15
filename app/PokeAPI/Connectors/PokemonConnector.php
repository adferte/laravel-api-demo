<?php

namespace App\PokeAPI\Connectors;

use App\Models\Pokemon;
use App\Models\Type;
use PokePHP\PokeApi;

class PokemonConnector implements Connector
{
    private PokeApi $pokeApi;

    public function __construct(PokeApi $pokeApi)
    {
        $this->pokeApi = $pokeApi;
    }

    public function connect(): void
    {
        $data = $this->pokeApi->resourceList('pokemon', config('pokeapi.pokemon_limit'));
        $pokemonResources = json_decode($data, true)['results'];
        foreach ($pokemonResources as $pokemonResource) {
            $pokemonsData = $this->pokeApi->pokemon($pokemonResource['name']);
            $pokemonData = json_decode($pokemonsData, true);
            $types = Type::all()->pluck(Type::ID, Type::NAME);

            $preparedTypeData = [];
            foreach ($pokemonData['types'] as $pokemonType) {
                $typeId = $types[$pokemonType['type']['name']];
                $preparedTypeData[$typeId] = ['slot' => $pokemonType['slot']];
            }

            $pokemon = Pokemon::updateOrCreate([
                Pokemon::NAME => $pokemonData['name']
            ], [
                Pokemon::POKEDEX_NUMBER => $pokemonData['id'],
                Pokemon::NAME => $pokemonData['name'],
                Pokemon::IMAGE => $pokemonData['sprites']['other']['official-artwork']['front_default'],
            ]);
            $pokemon->types()->sync($preparedTypeData);
        }
    }
}
