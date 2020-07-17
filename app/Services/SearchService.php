<?php


namespace App\Services;


use App\Repositories\SearchRepository;
use App\Services\Interfaces\SearchServiceInterface;

class SearchService implements SearchServiceInterface
{

    protected $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function showByTitle($data)
    {
        $result = $this->searchRepository->showByTitle($data);

        return $result;
    }
}
