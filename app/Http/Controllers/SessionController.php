<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    public function profile(Request $request)
    {
        return $request->user();
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::default()],
            'gender' => ['required', Rule::in(['male', 'female'])],
        ]);

        $user = User::query()->create($data);

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => __('Successfully authenticated'),
            'token' => $token,
        ]);
    }
}
