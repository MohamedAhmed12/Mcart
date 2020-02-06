<?php

namespace App\Users\Domain\Models;

use App\Ads\Domain\Models\Ad;
use App\PaymentMethods\Domain\Models\PaymentMethod;
use App\Users\Domain\Models\Role;
use Artify\Artify\Traits\Roles\Roles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
	use Notifiable, Roles;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * Get the identifier that will be stored in the subject claim of the JWT.
	 *
	 * @return mixed
	 */
	public function getJWTIdentifier() {
		return $this->getKey();
	}

	/**
	 * Return a key value array, containing any custom claims to be added to the JWT.
	 *
	 * @return array
	 */
	public function getJWTCustomClaims() {
		return [];
	}
	public function isActivated() {
		return $this->activation()->whereNotNull('completed_at')->exists();
	}

	public function generateAuthToken() {
		return \JWTAuth::fromUser($this);
	}
	public function reminder() {
		return $this->hasOne(Reminder::class, 'user_id', 'id');
	}
	public function paymentMethods() {
		return $this->hasMany(PaymentMethod::class, 'user_id', 'id');
	}
	public function roles() {
		return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
	}
	public function ads() {
		return $this->hasMany(Ad::class, 'owner_id', 'id');
	}
	public function soldierAds() {
		return $this->belongsToMany(Ad::class, 'ad_user', 'user_id', 'ad_id');
	}
	public function activation() {
		return $this->hasOne(Activation::class, 'user_id', 'id');
	}
	public function company() {
		return $this->belongsTo(Company::class, 'company_id', 'id');
	}
}
