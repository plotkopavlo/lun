<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes;

    protected $table = 'building';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function residentialComplex()
    {
        return $this->belongsTo(ResidentialComplex::class);
    }

    public function flats()
    {
        return $this->hasMany(Flat::class);
    }
}
