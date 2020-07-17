<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Services\AdService;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;

class AdController extends Controller
{
    public function __construct(AdService $adService)
    {
        $this->middleware(['auth:api']);
        $this->adService = $adService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = $this->adService->retrieveAll();

        return response()->json($ads, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request, Category $category)
    {
        if ($request->validated()) {

            $ad = $this->adService->create($request, $category);

            return response()->json($ad, 200);

        } else {

            return response()->json([
                'status' => 'error',
                'errors' => $request->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->adService->showBy($id);

        return response()->json($result, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'string',
            'content' => 'string'
        ]);

        $result = Ad::where('id', $id)->update($data);

        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $this->adService->removeItem($ad);
        return response()->json([
            'status' => 'Item has been removed', 200
        ]);
    }
}
