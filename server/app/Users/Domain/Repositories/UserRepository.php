<?php

namespace App\Users\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\Users\Domain\Models\User;

class UserRepository extends Repository {
	protected $model;
	public function __construct(User $user) {
		$this->model = $user;
	}
	public function getByEmail($email) {
		return $this->model->where('email', $email)->firstOrFail();
	}
	public function getByCompanyId($company_id) {
		return $this->model->where(compact('company_id'))->firstOrFail();
	}
	public function findById($id) {
		return $this->model::find($id);
	}
}
