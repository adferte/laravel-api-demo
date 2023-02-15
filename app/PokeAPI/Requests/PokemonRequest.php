<?php

namespace App\PokeAPI\Requests;

use App\Models\Pokemon;
use Illuminate\Foundation\Http\FormRequest;

class PokemonRequest extends FormRequest
{
    const ID = 'id';
    const POKEDEX = 'pokedex';
    public function rules(): array
    {
        return [
            self::ID => ['exists:' . Pokemon::TABLE . ',' . Pokemon::ID],
            self::POKEDEX => ['exists:' . Pokemon::TABLE . ',' . Pokemon::POKEDEX_NUMBER],
        ];
    }
}
