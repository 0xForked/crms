<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address_street_1', 'address_street_2',
        'city', 'state', 'country_id', 'zip'
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

    public function updateRequest(Request $request)
    {
        $this->name = $request->name;
        $this->email =  $request->email;
        $this->phone = $request->phone;
        $this->address_street_1 = $request->address_street_1;
        $this->address_street_2 = $request->address_street_2;
        $this->city = $request->city;
        $this->state = $request->state;
        $this->country_id = $request->country_id;
        $this->zip = $request->zip;
        return $this->save();
    }

}
