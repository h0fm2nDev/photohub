<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Photo;
use App\Services\PhotoService;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    private $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->middleware(['auth:api']);
        $this->photoService = $photoService;
    }

    public function show(Photo $photo, PhotoRequest $request)
    {
        if ($request->validated()) {

            $photo = $this->photoService->addNewData($request, $photo);

            return response()->json($photo, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return response()->json([
            'status' => 'Item has been removed', 200
        ]);
    }
}
