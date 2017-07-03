<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class FlatType extends Model
{
    public function flats()
    {
        return $this->hasMany(Flat::class);
    }
}
