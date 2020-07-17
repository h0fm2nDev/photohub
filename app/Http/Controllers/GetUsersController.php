<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GetUsersController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth:api']);
    }

    public function __invoke() 
    {
        $users = User::with(['ads', 'town', 'followers', 'followings'])->get();

        return response()->json($users, 200);
    }
}
