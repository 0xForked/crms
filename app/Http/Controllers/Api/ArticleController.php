<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleApiFilter;
use App\Http\Resources\ArticleResource;
use App\Http\Traits\ApiResponses;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return ApiResponses::successResponse(
            ArticleResource::collection(
                ArticleApiFilter::apply(
                    $request, (new Article)->newQuery()
                )->with('category')
                    ->where('status', PUBLISH)
                    ->paginate(20)
            )
        );
    }

}
