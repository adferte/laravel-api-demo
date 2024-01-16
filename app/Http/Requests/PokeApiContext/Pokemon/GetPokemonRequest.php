<?php

namespace App\Http\Requests\PokeApiContext\Pokemon;

use Illuminate\Foundation\Http\FormRequest;

class GetPokemonRequest extends FormRequest
{
    const ID = 'id';
    const POKEDEX = 'pokedex';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            self::POKEDEX => ['required', 'integer', 'gt:0', 'lte:' . config('pokeApi.pokemon_limit')],
        ];
    }
}
