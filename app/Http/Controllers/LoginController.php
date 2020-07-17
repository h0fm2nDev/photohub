<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(AuthRequest $request)
    {
        $validated = $request->validated();

        if (!$token = auth()->attempt($validated)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($token);
    }
}
