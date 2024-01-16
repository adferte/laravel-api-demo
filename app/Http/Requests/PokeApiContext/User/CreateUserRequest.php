<?php

namespace App\Http\Requests\PokeApiContext\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';

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
            self::NAME => ['required', 'string'],
            self::EMAIL => ['required', 'email', 'unique:users,email'],
            self::PASSWORD => ['required'],
        ];
    }
}
