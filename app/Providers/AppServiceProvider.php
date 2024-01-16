<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\ApiContext\Domain\Model\Pokemon\PokemonRepository;
use Src\ApiContext\Domain\Model\Type\TypeRepository;
use Src\ApiContext\Domain\Model\User\UserRepository;
use Src\ApiContext\Infrastructure\Domain\Model\Pokemon\EloquentPokemonRepository;
use Src\ApiContext\Infrastructure\Domain\Model\Type\EloquentTypeRepository;
use Src\ApiContext\Infrastructure\Domain\Model\User\EloquentUserRepository;
use Src\ddd\Infrastructure\Application\ICommandBus;
use Src\ddd\Infrastructure\Application\IQueryBus;
use Src\ddd\Infrastructure\Bus\CommandBus;
use Src\ddd\Infrastructure\Bus\QueryBus;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IQueryBus::class, QueryBus::class);
        $this->app->bind(ICommandBus::class, CommandBus::class);
        $this->app->bind(PokemonRepository::class, EloquentPokemonRepository::class);
        $this->app->bind(TypeRepository::class, EloquentTypeRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
