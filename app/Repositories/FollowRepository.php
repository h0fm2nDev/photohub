<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\FollowInterface;

class FollowRepository implements FollowInterface
{
    public function followUser($user)
    {
        $userToFollow = User::find($user->id);
        $response = auth()->user()->follow($userToFollow);

        return $response;
    }

    public function followersCount()
    {
        $response = auth()->user()->followers()->count();

        return $response;
    }

    public function followingCount()
    {
        $response = auth()->user()->followings()->count();

        return $response;
    }
}