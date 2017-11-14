<?php

namespace App\Repositories\Criteria\Flat;

use Illuminate\Support\Facades\DB;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class SampleCity extends Criteria {

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        //sort from minimum price (price calculated)
        $model = $model->where('city_id', $cityID);
        return $model;
    }
}