<?php

namespace App\Repositories\Interfaces;

interface EloquentRepositoryRelationInterface
{
    public function all();

    public function create($data, $relation);

    public function showBy($id);

    public function remove($id);
}
