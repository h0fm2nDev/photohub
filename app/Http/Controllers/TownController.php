<?php

namespace App\Http\Controllers;

use App\Town;
use App\Services\TownService;
use Illuminate\Http\Request;
use App\Http\Requests\TownRequest;

class TownController extends Controller
{
    private $townService;

    public function __construct(TownService $townService)
    {
        $this->middleware(['auth:api']);
        $this->townService = $townService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = $this->townService->retrieveAll();

        return response()->json($towns, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TownRequest $request)
    {
        if ($request->validated()) {

            $town = $this->townService->addNew($request);

            return response()->json($town, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show(Town $town)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Town $town)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function destroy(Town $town)
    {
        $this->townService->removeItem($town);
        return response()->json([
            'status' => 'Item has been deleted', 200
        ]);
    }
}
