<?php

namespace App\Repositories\Interfaces;

interface FollowInterface
{
    public function followUser($data);

    public function followersCount();

    public function followingCount();
}