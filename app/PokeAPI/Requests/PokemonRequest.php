<?php

namespace App\PokeAPI\Requests;

use App\Models\Pokemon;
use Illuminate\Foundation\Http\FormRequest;

class PokemonRequest extends FormRequest
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
            self::ID => ['exists:' . Pokemon::TABLE . ',' . Pokemon::ID],
            self::POKEDEX => ['exists:' . Pokemon::TABLE . ',' . Pokemon::POKEDEX_NUMBER],
        ];
    }
}
