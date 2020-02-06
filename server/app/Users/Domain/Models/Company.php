<?php

namespace App\Users\Domain\Models;

use App\Users\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {
	protected $fillable = ['id', 'name'];

	public function users() {
		return $this->hasMany(User::class, 'company_id', 'id');
	}
}
