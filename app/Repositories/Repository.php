<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository as BosnadevRepository;

abstract class Repository extends BosnadevRepository {

    /**
     * @param $field
     * @param $sort
     * @return $this
     */
    public function orderBy($field, $sort)
    {
        $this->applyCriteria();

        $this->model = $this->model->orderBy($field, $sort);

        return $this;
    }

    public function associate()
    {

    }
}