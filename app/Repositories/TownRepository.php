<?php

namespace App\Repositories;

use App\Town;
use App\Repositories\Interfaces\EloquentRepositoryInterface;

class TownRepository implements EloquentRepositoryInterface
{
    public function all()
    {
        return Town::with('users')->get();
    }

    public function create($request)
    {
        if($request->hasFile('imgbg')){

            $filenameWithExt = $request->file('imgbg')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imgbg')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('imgbg')->storeAs('public/covers', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $town = new Town;
        $town->name = $request->name;
        $town->imgbg = $fileNameToStore;
        $town->save();

        return $town;
    }

    public function remove($town)
    {
        $town->delete();
    }
}
