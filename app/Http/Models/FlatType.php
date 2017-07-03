<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class FlatType extends Model
{
    protected $table = 'flat_type';

    public function flats()
    {
        return $this->hasMany(Flat::class);
    }
}
