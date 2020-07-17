<?php

namespace App\Repositories;

use App\Ad;
use App\Repositories\Interfaces\EloquentRepositoryRelationInterface;

class AdRepository implements EloquentRepositoryRelationInterface
{
    public function all()
    {
        return Ad::with(['user', 'category', 'comments'])->get();
    }

    public function create($request, $category)
    {
        $ad = new Ad();
        $ad->title = $request->title;
        $ad->content = $request->content;
        $ad->user_id = auth()->user()->id;
        $ad->category_id = $category->id;
        $ad->save();

        return $ad;
    }

    public function showBy($id)
    {
        $result = Ad::where('id', $id)->with(['user', 'category', 'comments'])->firstOrFail();

        return $result;
    }

    public function remove($ad)
    {
        $ad->delete();
    }

}
