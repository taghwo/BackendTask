<?php

namespace App\Repository;

use App\Repository\Exceptions\NoEntityDefined;

abstract class RepositoryAbstract
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function fetchPaginated($page=10)
    {
        return $this->entity->paginate($page);
    }

    public function createModel(array $properties)
    {
        return $this->entity->create($properties);
    }
    public function updateModel(object $model, array $properties)
    {
        return $model->update($properties);
    }

    public function deleteModel(object $model)
    {
        return $model->delete();
    }

    private function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }
        return app()->make($this->entity());
    }
}
