<?php

namespace App\Users\Domain\Pipelines;

use App\App\Domain\Contracts\Pipeline;
use App\Users\Domain\Repositories\CompanyReposiroty;
use App\Users\Domain\Repositories\UserRepository;
use Illuminate\Support\Arr;

class CreateUserPipeline implements Pipeline {
	protected $users;
	protected $companies;

	public function __construct(UserRepository $users, CompanyReposiroty $companies) {
		$this->users = $users;
		$this->companies = $companies;
	}

	public function handle($data, \Closure $next) {
		// create company record
		$company = $this->companies->create([
			'name' => $data['company']]);
		// get id of company that jsut created
		$company = $this->companies->latest()
			->first();
		// remove company name from $data array
		Arr::forget($data, ['company']);
		// add company id to $data array
		$data['company_id'] = $company->id;
		// create user record
		$user = $this->users->create($data);

		// $company = $this->companies->latest()
		// 	->first();
		// dd($company, $user);
		// $company->users()->attach($user);
		return $next($user);
	}

}
