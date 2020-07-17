<?php


namespace App\Repositories;


use App\Gallery;
use App\Http\Requests\PhotoRequest;
use App\Photo;
use App\Repositories\Interfaces\EloquentRepositoryRelationInterface;

class PhotoRepository implements EloquentRepositoryRelationInterface
{
    public function all()
    {
        $result = Photo::all();

        return $result;
    }

    public function create($request, $gallery)
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

        $photo = new Photo();
        $photo->name = $request->name;
        $photo->user_id = auth()->user()->id;
        $photo->gallery_id = $gallery->id;
        $photo->imgbg = $fileNameToStore;

        return $photo;
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function showBy($id)
    {
        // TODO: Implement showBy() method.
    }
}
