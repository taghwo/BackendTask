<?php

namespace App\Repository\Eloquent;

use App\Repository\RepositoryAbstract;
use App\Repository\Contracts\TodoContract;
use App\Models\Todo;

class TodoEloquent extends RepositoryAbstract implements TodoContract
{
    public function entity()
    {
        return Todo::class;
    }
}
