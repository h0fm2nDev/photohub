<?php


namespace App\Repositories;

use App\Portfolio;
use App\Gallery;
use App\User;
use App\Repositories\Interfaces\GalleryInterface;

class GalleryRepository implements GalleryInterface
{
    public function showGallery($id)
    {
        $result = Gallery::with('photos')->whereIn("id", $id)->get();

        return $result;
    }

    public function storeGallery($project, $request)
    {
        if ($request->validated())
        {
            $gallery = new Gallery();
            $gallery->title = $request->title;
            $gallery->user_id = auth()->user()->id;
            $gallery->project_id = $project->id;

            $gallery->save();

            return $gallery;
        }
    }

    public function removeGallery($gallery)
    {
        $gallery->delete();
        return response()->json([
            'status' => 'Item has been removed', 200
        ]);
    }
}
