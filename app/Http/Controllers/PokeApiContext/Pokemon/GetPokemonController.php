<?php

namespace App\Http\Controllers\PokeApiContext\Pokemon;

use App\Http\Controllers\BaseController;
use App\Http\Requests\PokeApiContext\Pokemon\GetPokemonRequest;

class GetPokemonController extends BaseController
{
    public function __construct(
        private readonly \Src\ApiContext\Infrastructure\Controller\Pokemon\GetPokemonController $controller
    )
    {
    }

    public function __invoke(GetPokemonRequest $request)
    {
        return response($this->controller->__invoke($request->validated()), 200);
    }
}
