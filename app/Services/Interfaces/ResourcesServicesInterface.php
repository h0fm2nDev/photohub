<?php


namespace App\Services\Interfaces;


interface ResourcesServicesInterface
{
    public function retrieveAll();

    public function addNew($data);

    public function showBy($id);

    public function removeItem($id);
}
