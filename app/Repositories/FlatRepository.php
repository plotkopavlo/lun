<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class FlatRepository extends Repository {

    public function model() {
        return 'App\Http\Models\Flat';
    }

    /**
     *
     * TODO: denormalize DB and rewrite without joins
     * @param $cityID
     * @return $this
     */
    public function filterByCity($cityID)
    {
        $this->applyCriteria();

        /** bugs cuz group by and select count(*) */
        $this->model = $this->model
            ->select('flat.id')

            ->join('building_flat as bf', 'bf.flat_id', '=', 'flat.id')
            ->join('building as b',  'bf.building_id', '=', 'b.id')
            ->join('residential_complex as rc', 'b.residential_complex_id', '=', 'rc.id')
            ->join('city as c', 'c.id', '=', 'rc.city_id')
            ->where('c.id', '=', $cityID)

            //mysql 7.5+ only group by...TODO: rewrite this night code
            //->groupBy('bf.id')
            //->groupBy('b.id')
            //->groupBy('rc.id')
            //->groupBy('c.id')
            //->groupBy('flat.id')

            //->distinct('flat.id')
        ;

        return $this;
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