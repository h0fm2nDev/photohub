<?php


namespace App\Services;


use App\Repositories\PhotoRepository;
use App\Services\Interfaces\AddNewDataWithRelationInterface;
use App\Services\Interfaces\ResourcesServicesInterface;

class PhotoService implements ResourcesServicesInterface, AddNewDataWithRelationInterface
{
    private $photoRepository;

    public function __construct(PhotoRepository $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    public function addNewData($data, $relation)
    {
        $result = $this->photoRepository->create($data, $relation);

        return $result;
    }

    public function retrieveAll()
    {
        // TODO: Implement retrieveAll() method.
    }

    public function addNew($data)
    {
        // TODO: Implement addNew() method.
    }

    public function showBy($id)
    {
        // TODO: Implement showBy() method.
    }

    public function removeItem($id)
    {
        // TODO: Implement removeItem() method.
    }
}
