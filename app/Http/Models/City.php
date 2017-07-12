<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function residentialComplexes()
    {
        return $this->hasMany(ResidentialComplex::class);
    }
}
