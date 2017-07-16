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

    /**
     * Build assoc array key => value
     *
     * @param $key
     * @param $value
     * @return array
     */
    public function getAssocArray($key, $value)
    {
        $this->applyCriteria();

        $allModels = $this->model->all();

        $modelsAssoc = [];
        foreach ($allModels as $model)
        {
            $modelsAssoc[$model->$key] = $model->$value;
        }

        return $modelsAssoc;
    }

    public function associate()
    {

    }
}