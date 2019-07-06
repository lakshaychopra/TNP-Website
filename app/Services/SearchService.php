<?php

namespace App\Services;

use App\Models\Student;
use App\Models\SemesterMarks;
use App\Models\PreviousEducation;
use App\Models\MetricsEducation;

use App\Repositories\SearchRepository;
use File;

class SearchService
{	
	public function __construct(SearchRepository $repository)
	{
		$this->repository = $repository;
    }
    public function searchStudent()
	{
		return $this->repository->search();
	}
}