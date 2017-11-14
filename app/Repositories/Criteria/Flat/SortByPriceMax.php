<?php

namespace App\Repositories\Criteria\Flat;

use Illuminate\Support\Facades\DB;

use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class SortByPriceMax extends Criteria {

    public $sortOrder = 'asc';

    public function __construct($sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        //sort from minimum price (price calculated)
        $model = $model->select(DB::raw('*, (COALESCE(price_total, 0) + ( COALESCE(price_per_m2, 0) * area_m2) ) as price '))
            //for mysql 7.5+
            //->groupBy('flat.id')
            ->orderBy('price', $this->sortOrder)
        ;

        return $model;
    }
}