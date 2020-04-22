<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $articles = ArticleFilter::apply(
            $request,
            (new Article)->newQuery()
        )->with('category')->paginate(10);

        $categories = Category::all();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleRequest $request)
    {
        $store = Article::create([
            'category_id' => $request->category,
            'featured_image' => $request->featured_image,
            'slug' => Str::slug($request->title, "-").'-'.time(),
            'title' => $request->title,
            'content_html' => $request->content_html,
            'content_json' => $request->content_json,
            'content_text' => $request->content_text,
            'status' => $request->status
        ]);

        if (!$store) return redirect()->back()->with('error', 'Failed store Article');

        return redirect()->route('articles.index')->with('success', 'Success add new Article');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        $categories = Category::all();

        return view('admin.articles.edit', compact('article', 'categories'));
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
        $article = Article::findOrFail($id);

        $article->category_id = $request->category;
        $article->featured_image = $request->featured_image;
        $article->slug = Str::slug($request->title, "-").'-'.time();
        $article->title = $request->title;
        $article->content_html = $request->content_html;
        $article->content_json = $request->content_json;
        $article->content_text = $request->content_text;
        $article->status = $request->status;
        $article->save();

        return redirect()->route('articles.index')->with(
            'success',
            'Success update article'
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
        $article = Article::findOrFail($id);

        $article->status = ($article->status === DRAFT) ? PUBLISH : DRAFT;
        $article->save();

        return redirect()->route('articles.index')->with(
            'success',
            'Success change article status'
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
        $article = Article::onlyTrashed()->findOrFail($id);

        $article->restore();

        return redirect()->route('articles.index')->with(
            'success',
            'Success restore article'
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
        $article = Article::withTrashed()->findOrFail($id);

        if ($article->deleted_at) {
            $article->forceDelete();
        }

        $article->delete();

        return redirect()->route('articles.index')->with(
            'success',
            'Success delete article'
        );
    }

}
