<?php

namespace App\Repositories\Interfaces;

interface EloquentRepositoryInterface
{
    public function all();

    public function create($data);

    public function remove($id);
}
