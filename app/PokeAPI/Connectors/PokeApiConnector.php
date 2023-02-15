<?php

namespace App\PokeAPI\Connectors;

use PokePHP\PokeApi;

class PokeApiConnector implements Connector
{
    public function connect(): void
    {
        $pokeApi = new PokeApi();
        (new TypeConnector($pokeApi))->connect();
        (new PokemonConnector($pokeApi))->connect();
    }
}
