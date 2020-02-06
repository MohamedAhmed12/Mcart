<?php

namespace App\Users\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model {
	protected $fillable = [
		'name',
		'points',
		'click_price',
		'sharing_limit',
	];
}
