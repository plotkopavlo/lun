<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\SoftDeletes;

class Flat extends Model
{
    use SoftDeletes;

    protected $table = 'flat';

    protected $fillable = [
        'name', 'description', 'num_of_rooms', 'area_m2',
        'flat_type_id', 'price_total', 'price_per_m2', 'city_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function buildings()
    {
        return $this->belongsToMany(Building::class);
    }

    /**
     * Get type of the flat
     */
    public function type()
    {
        return $this->belongsTo(FlatType::class, 'flat_type_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getPriceTotalAttribute()
    {
        return $this->attributes['price_per_m2'] * $this->attributes['area_m2'];
    }

}
