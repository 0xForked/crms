<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $media = Media::paginate(20);

        return view('admin.media.index', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "file" => 'required|mimes:png,jpeg,jpg,gif,svg|max:2048', //2mb
            'display_name' => 'required'
        ]);

        if (!File::isDirectory(storage_path('app/public/images'))) {
            File::makeDirectory(storage_path('app/public/images'));
        }

        // create new name for file
        $file = $request->file("file");
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // upload original file
        Image::make($file)->save(storage_path('app/public/images/') . $fileName);

        Media::create([
            'name' => $fileName,
            'display_name' => $request->display_name
        ]);

        return redirect()->back()->with('success', 'Media stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $media = Media::findOrFail($id);

        return response()->json($media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);

        $media->display_name = $request->display_name;
        $media->save();

        return redirect()->back()->with('success', 'Media update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        if(Storage::disk('public')->delete('images/' .$media->name)) {
            $media->delete();
        }

        return redirect()->to('media')->with('success', 'Media delete successfully');
    }
}
