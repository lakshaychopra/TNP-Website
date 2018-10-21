<?php

namespace App\Services;

use App\Models\AboutWidget;
use App\Repositories\AboutWidgetRepository;

class AboutWidgetService
{	
	public function __construct(AboutWidgetRepository $repository)
	{
		$this->repository = $repository;
	}
}