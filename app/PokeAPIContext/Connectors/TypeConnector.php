<?php

namespace App\PokeAPIContext\Connectors;

use PokePHP\PokeApi;
use Src\ApiContext\Domain\Model\Type\Type;

class TypeConnector implements Connector
{

    public function __construct(
        private readonly PokeApi $pokeApi
    )
    {
    }

    public function connect(): void
    {
        $data = $this->pokeApi->resourceList('type', config('pokeApi.type_limit'));
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
