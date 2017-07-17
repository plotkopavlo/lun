<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class FlatRepository extends Repository {

    public function model() {
        return 'App\Http\Models\Flat';
    }

    public function filterByCity($cityID)
    {

    }

    /**
     * Get the maximum rooms in flat
     * @return mixed
     */
    public function getMaxRooms()
    {
        $maxRooms = DB::select('SELECT max(num_of_rooms) as max_rooms FROM flat');

        $maxRooms = isset($maxRooms[0]) ? $maxRooms[0]->max_rooms : 0;

        return $maxRooms;
    }

    public function withResidentialComplex()
    {
        //
    }
}