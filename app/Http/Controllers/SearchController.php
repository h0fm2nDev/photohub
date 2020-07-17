<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->middleware(['auth:api']);
        $this->searchService = $searchService;
    }

    public function __invoke(SearchRequest $request)
    {
        if ($request->validated()) {

            $result = $this->searchService->showByTitle($request);

            return response()->json($result, 200);

        } else {

            return response()->json([
                'status' => 'error',
                'errors' => $request->errors()
            ], 422);
        }
    }
}
