<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api');
    }
    
    public function __invoke()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
