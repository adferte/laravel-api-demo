<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::where(User::EMAIL, $validatedData[LoginRequest::EMAIL])->first();

        if (!$user || !Hash::check($validatedData[LoginRequest::PASSWORD], $user->{User::PASSWORD})) {
            return response()->json(['error' => 'Login invalid']);
        }

        return $user->createToken($user->{User::EMAIL})->plainTextToken;
    }
}
