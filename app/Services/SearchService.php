<?php

namespace App\Services;

use App\Repositories\SearchRepository;

class SearchService
{	
	public function __construct(SearchRepository $repository)
	{
		$this->repository = $repository;
    }
	public function searchStudent($request)
	{
		return $this->repository->search($request);
	}
}