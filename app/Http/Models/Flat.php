<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Database\Eloquent\SoftDeletes;

class Flat extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    /**
     * Get type of the flat
     */
    public function type()
    {
        return $this->belongsTo(FlatType::class);
    }
}
