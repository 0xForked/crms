<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'featured_image', 'title', 'slug', 'description',
        'link_source', 'link_store', 'link_live',
        'link_doc', 'type', 'status'
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

    public function customers()
    {
        return $this->belongsToMany(
            'App\Models\Customer',
            "customers_has_projects"
        );
    }
}
