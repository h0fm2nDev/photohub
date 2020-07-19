<?php


namespace App\Repositories\Interfaces;


interface GalleryInterface
{
    public function showGallery($portfolio);

    public function storeGallery($portfolio, $data);

    public function removeGallery($gallery);
}
