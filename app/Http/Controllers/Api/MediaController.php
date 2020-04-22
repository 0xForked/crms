<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
       if ($request->search) {
           $media = Media::where(
               'display_name',
               'LIKE',
               "%$request->search%"
           )->orderBy('created_at', 'desc')->limit(10)->get();
       } else {
           $media = Media::orderBy('created_at', 'desc')
               ->limit(10)
               ->get();
       }

        return response()->json($media);
    }
}
