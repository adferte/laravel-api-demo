<?php

namespace App\PokeAPI\Connectors;

use App\Models\Type;
use PokePHP\PokeApi;

class TypeConnector implements Connector
{
    private PokeApi $pokeApi;

    public function __construct(PokeApi $pokeApi)
    {
        $this->pokeApi = $pokeApi;
    }

    public function connect(): void
    {
        $data = $this->pokeApi->resourceList('type', config('pokeapi.type_limit'));
        $types = json_decode($data, true)['results'];
        foreach ($types as $type) {
            Type::updateOrCreate([
                Type::NAME => $type['name']
            ], [
                Type::NAME => $type['name'],
            ]);
        }
    }
}
