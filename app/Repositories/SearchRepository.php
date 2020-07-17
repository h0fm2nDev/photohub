<?php


namespace App\Repositories;

use App\Ad;
use App\Repositories\Interfaces\SearchRepositoryInterface;

class SearchRepository implements SearchRepositoryInterface
{
    public function showByTitle($request)
    {
        $result = Ad::where('title', $request->title)
            ->orWhere('title', 'like', '%' . $request->title . '%')->get();

        return $result;
    }
}
