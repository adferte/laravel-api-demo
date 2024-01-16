<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Src\ApiContext\Domain\Model\User\User;

class LoginController extends BaseController
{
    public function __invoke(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::where(User::EMAIL, $validatedData[LoginRequest::EMAIL])->first();

        if (!$user || !Hash::check($validatedData[LoginRequest::PASSWORD], $user->{User::PASSWORD})) {
            return response()->json(['error' => 'Login invalid']);
        }

        return $user->createToken($user->{User::EMAIL})->plainTextToken;
    }
}
