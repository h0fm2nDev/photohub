<?php

namespace App\Http\Controllers;

use App\User;
use App\Town;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, Town $town)
    {
        if ($request->validated()) {

            $user = new User;
            $user->nickname = $request->nickname;
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->town_id = $town->id;
            $user->save();

            return response()->json(['status' => 'success'], 200);

        } else {

            return response()->json([
                'status' => 'error',
                'errors' => $request->errors()
            ], 422);
        }


    }
}
