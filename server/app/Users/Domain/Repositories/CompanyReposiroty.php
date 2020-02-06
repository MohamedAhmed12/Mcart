<?php

namespace App\Users\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\Users\Domain\Models\Company;

class CompanyReposiroty extends Repository {
	protected $model;
	public function __construct(Company $company) {
		$this->model = $company;
	}
}
