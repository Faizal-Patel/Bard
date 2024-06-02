<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class ApiTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = $request->user();

        // enforce read permissions only
        $token = $user->createToken($request->name, ['read'])->plainTextToken;

        return response()->json([
            'message' => 'API Token created successfully',
            'token' => $token,
        ]);
    }

    public function validateApiKey(Request $request)
    {
        $token = PersonalAccessToken::findToken($request->token);

        if (!$token || $token->tokenable->id !== $request->user()->id) {
            return response()->json(['valid' => false]);
        }

        return response()->json(['valid' => true]);
    }
}
