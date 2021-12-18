<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Search\Contracts\SearchServiceInterface;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SearchServiceInterface $searchService)
    {
        //
        $results = $searchService->index(trim($request->param));

        return view('frontend.search', ['results' => $results]);
    }
}
