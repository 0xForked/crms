<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Project extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description',
        'link_source', 'link_store', 'link_live',
        'link_doc', 'type', 'status', 'featured_image'
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

    public static function storeRequest(Request $request, $store_link)
    {
        return self::create([
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
    }

    public function updateRequest(Request $request, $store_link)
    {
        $this->featured_image = $request->featured_image;
        $this->title = $request->title;
        $this->slug = Str::slug($request->title, "-").'-'.time();
        $this->description = $request->description;
        $this->link_source = $request->link_source;
        $this->link_store =  json_encode($store_link);
        $this->link_live = $request->link_live;
        $this->link_doc =  $request->link_doc;
        $this->type = $request->type;
        $this->status = $request->status;
        $this->save();
    }
}
