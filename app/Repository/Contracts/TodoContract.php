<?php

namespace App\Repository\Contracts;

interface TodoContract
{
    public function fetchAll();
    public function createModel(array $data);
    public function updateModel(object $model, array $data);
    public function deleteModel(object $model);
}
