<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\SoftDeletes;

class ResidentialComplex extends Model
{
    use SoftDeletes;

    protected $table = 'residential_complex';

    protected $fillable = ['name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    /**
     * Get all of the flats for the complex.
     */
    public function flats()
    {
        return $this->hasManyThrough(Flat::class, Building::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
