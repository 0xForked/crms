<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'slug', 'title' , 'featured_image',
        'content_html', 'content_json', 'content_text', 'status'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function storeRequest(Request $request)
    {
        return self::create([
            'category_id' => $request->category,
            'featured_image' => $request->featured_image,
            'slug' => Str::slug($request->title, "-").'-'.time(),
            'title' => $request->title,
            'content_html' => $request->content_html,
            'content_json' => $request->content_json,
            'content_text' => $request->content_text,
            'status' => $request->status
        ]);
    }

    public function updateRequest(Request $request)
    {
        $this->category_id = $request->category;
        $this->featured_image = $request->featured_image;
        $this->slug = Str::slug($request->title, "-").'-'.time();
        $this->title = $request->title;
        $this->content_html = $request->content_html;
        $this->content_json = $request->content_json;
        $this->content_text = $request->content_text;
        $this->status = $request->status;
        return $this->save();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
