<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProjectFilter;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projects =  ProjectFilter::apply(
            $request,
            (new Project)->newQuery()
        )->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.projects.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProjectRequest $request)
    {
        $store_link = $this->storeLink($request);

        $store = Project::create([
            'featured_image' => $request->featured_image,
            'title' => $request->title,
            'slug' => Str::slug($request->title, "-").'-'.time(),
            'description' => $request->description,
            'link_source' => $request->link_source,
            'link_store' => json_encode($store_link),
            'link_live' => $request->link_live,
            'link_doc' => $request->link_doc,
            'type' => $request->type,
            'status' => $request->status
        ]);

        if (!$store) return redirect()->back()->with('error', 'Failed store Project');

        return redirect()->route('projects.index')->with('success', 'Success add new Project');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
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
        $project = Project::findOrFail($id);

        $store_link = $this->storeLink($request);

        $project->featured_image = $request->featured_image;
        $project->title = $request->title;
        $project->slug = Str::slug($request->title, "-").'-'.time();
        $project->description = $request->description;
        $project->link_source = $request->link_source;
        $project->link_store =  json_encode($store_link);
        $project->link_live = $request->link_live;
        $project->link_doc =  $request->link_doc;
        $project->type = $request->type;
        $project->status = $request->status;
        $project->save();

        return redirect()->route('projects.index')->with(
            'success',
            'Success update projects'
        );
    }

    /**
     * Change the specified resource status from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status($id)
    {
        $project = Project::findOrFail($id);

        $project->status = ($project->status === DRAFT) ? PUBLISH : DRAFT;
        $project->save();

        return redirect()->route('projects.index')->with(
            'success',
            'Success change project status'
        );
    }

    /**
     * restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);

        $project->restore();

        return redirect()->route('projects.index')->with(
            'success',
            'Success restore project'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $project = Project::withTrashed()->findOrFail($id);

        if ($project->deleted_at) {
            $project->forceDelete();
        }

        $project->delete();

        return redirect()->route('projects.index')->with(
            'success',
            'Success delete project'
        );
    }

    private function storeLink(Request $request)
    {
        $store_link = [];

        if ($request->type === MOBILE) {
            for ($i = 1; $i <= 3; $i++) {
                if (!isset($request["store_name{$i}"])
                    && !isset($request["store_link{$i}"]))  break;
                if ($request["store_link{$i}"] === null)  break;

                $store_link[] = [
                    'name' => $request["store_name{$i}"],
                    'link' => $request["store_link{$i}"]
                ];
            }
        }

        return $store_link;
    }
}
