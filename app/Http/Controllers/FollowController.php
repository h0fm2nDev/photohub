<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\FollowInterface;

class FollowController extends Controller
{
    public function __construct(FollowInterface $followRepository)
    {
        $this->middleware(['auth:api']);
        $this->followRepository = $followRepository;
    }

    public function followUser(User $user)
    {
        $response = $this->followRepository->followUser($user);

        return response()->json($response, 200);
    }

    public function followersCount()
    {
        $response = $this->followRepository->followersCount();

        return response()->json([
            'Followers' => $response
        ], 200);
    }

    public function followingCount()
    {
        $response = $this->followRepository->followingCount();

        return response()->json([
            'Followings' => $response
        ], 200);
    }
}
