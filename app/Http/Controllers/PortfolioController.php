<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getall = Portfolio::with('project')->get();

        return response()->json($getall, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        if ($request->validated()) {

            $portfolio = new Portfolio;
            $portfolio->title = $request->title;
            $portfolio->user_id = auth()->user()->id;
            $portfolio->description = $request->description;
            $portfolio->save();

            return response()->json([
                'status' => 'success', 200
            ]);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        $portfolioitem = Portfolio::with('project')->whereIn("id", $portfolio)->get();

        return response()->json($portfolioitem, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return response()->json([
            'status' => 'Item has been removed', 200
        ]);
    }
}
