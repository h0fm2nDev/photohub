<?php


namespace App\Services;


use App\Repositories\AdRepository;
use App\Services\Interfaces\ResourcesServicesInterface;

class AdService implements ResourcesServicesInterface
{
    protected $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function retrieveAll()
    {
        $result = $this->adRepository->all();

        return $result;
    }

    public function addNew($data)
    {
        $result = $this->adRepository->create($data);

        return $result;
    }

    public function showBy($id)
    {
        $result = $this->adRepository->showBy($id);

        return $result;
    }

    public function removeItem($id)
    {
        $result = $this->adRepository->remove($id);

        return $result;
    }
}
