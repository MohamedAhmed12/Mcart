<?php

namespace App\Users\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\Users\Domain\Models\Role;

class RoleRepository extends Repository {
	protected $model;

	public function __construct(Role $model) {
		$this->model = $model;
	}
	public function findRoleBySlug($slug) {
		return $this->model->whereSlug($slug)->first();
	}
	public function findRoleByName($name) {
		return $this->model->whereName($name)->first();
	}
	public function findRolebyId($id) {
		return $this->model->whereId($id)->first();
	}
}