<?php

namespace Tests\ApiContext;

use Src\ApiContext\Application\Command\User\CreateUserHandler;
use Src\ApiContext\Application\Query\Pokemon\GetPokemonHandler;
use Src\ApiContext\Application\Query\Type\GetTypesHandler;
use Src\ApiContext\Application\Query\User\GetCurrentUserHandler;
use Src\ApiContext\Domain\Model\Pokemon\PokemonRepository;
use Src\ApiContext\Domain\Model\Type\TypeRepository;
use Src\ApiContext\Domain\Model\User\UserRepository;
use Src\ApiContext\Infrastructure\Domain\Model\Pokemon\EloquentPokemonRepository;
use Src\ApiContext\Infrastructure\Domain\Model\Type\EloquentTypeRepository;
use Src\ApiContext\Infrastructure\Domain\Model\User\EloquentUserRepository;
use Tests\TestCase;

class ApiContextUnitTestCase extends TestCase
{
    private PokemonRepository $pokemonRepository;
    private TypeRepository $typeRepository;
    private UserRepository $userRepository;

    public function getPokemonHandler(): GetPokemonHandler
    {
        return new GetPokemonHandler($this->pokemonRepository());
    }

    protected function pokemonRepository(): PokemonRepository
    {
        if (!isset($this->pokemonRepository)) {
            $this->pokemonRepository = new EloquentPokemonRepository();
        }
        return $this->pokemonRepository;
    }

    public function getTypesHandler(): GetTypesHandler
    {
        return new GetTypesHandler($this->typeRepository());
    }

    protected function typeRepository(): TypeRepository
    {
        if (!isset($this->typeRepository)) {
            $this->typeRepository = new EloquentTypeRepository();
        }
        return $this->typeRepository;
    }

    public function getCurrentUserHandler(): GetCurrentUserHandler
    {
        return new GetCurrentUserHandler($this->userRepository());
    }

    protected function userRepository(): UserRepository
    {
        if (!isset($this->userRepository)) {
            $this->userRepository = new EloquentUserRepository();
        }
        return $this->userRepository;
    }

    public function createUserHandler(): CreateUserHandler
    {
        return new CreateUserHandler($this->userRepository());
    }
}
