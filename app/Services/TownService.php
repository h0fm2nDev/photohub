<?php

namespace App\Services;

use App\Repositories\TownRepository;
use App\Services\Interfaces\ResourcesServicesInterface;

class TownService implements ResourcesServicesInterface
{
    protected $townRepository;

    public function __construct(TownRepository $townRepository)
    {
        $this->townRepository = $townRepository;
    }

    public function retrieveAll()
    {
        $result = $this->townRepository->all();

        return $result;
    }

    public function addNew($data)
    {
        $result = $this->townRepository->create($data);

        return $result;
    }

    public function removeItem($id)
    {
        $result = $this->townRepository->remove($id);

        return $result;
    }

    public function showBy($id)
    {
        // TODO: Implement showBy() method.
    }
}
