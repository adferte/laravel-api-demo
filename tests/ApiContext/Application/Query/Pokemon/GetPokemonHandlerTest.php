<?php

namespace Tests\ApiContext\Application\Query\Pokemon;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Src\ApiContext\Application\Query\Pokemon\GetPokemonHandler;
use Src\ApiContext\Application\Query\Pokemon\GetPokemonQuery;
use Src\ApiContext\Domain\Exception\Pokemon\PokemonNotFoundException;
use Src\ApiContext\Domain\ModelView\Pokemon\PokemonView;
use Tests\ApiContext\ApiContextUnitTestCase;

class GetPokemonHandlerTest extends ApiContextUnitTestCase
{
    use DatabaseTransactions;

    public GetPokemonHandler $handler;

    public function setUp(): void
    {
        parent::setUp();
        $this->handler = $this->getPokemonHandler();
    }

    public function test_should_get_pokemon_data(): void
    {
        $pokedexNumber = random_int(1, config('pokeApi.pokemon_limit'));

        $busResponse = $this->handler->__invoke(new GetPokemonQuery($pokedexNumber));
        $response = $busResponse->data();

        $databasePokemon = $this->pokemonRepository()->getPokemon($pokedexNumber);
        $this->assertNotNull($databasePokemon);

        $pokemonView = new PokemonView($databasePokemon);

        $this->assertArrayHasKey('id', $response);
        $this->assertEquals($pokemonView->id(), $response['id']);
        $this->assertArrayHasKey('pokedex', $response);
        $this->assertEquals($pokemonView->pokedexNumber(), $response['pokedex']);
        $this->assertArrayHasKey('name', $response);
        $this->assertEquals($pokemonView->name(), $response['name']);
        $this->assertArrayHasKey('image', $response);
        $this->assertEquals($pokemonView->image(), $response['image']);
        $this->assertArrayHasKey('types', $response);
        $this->assertEquals($pokemonView->types(), $response['types']);

        foreach ($response['types'] as $key => $type) {
            $this->assertArrayHasKey('id', $type);
            $this->assertEquals($pokemonView->types()[$key]['id'], $type['id']);
            $this->assertArrayHasKey('name', $type);
            $this->assertEquals($pokemonView->types()[$key]['name'], $type['name']);
        }
    }

    public function test_should_throw_pokemon_not_found_exception(): void
    {
        $this->expectException(PokemonNotFoundException::class);
        $this->handler->__invoke(new GetPokemonQuery(-1));
    }
}
