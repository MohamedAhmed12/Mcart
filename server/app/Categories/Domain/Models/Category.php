<?php

namespace App\Categories\Domain\Models;

use App\App\Domain\Traits\HasChildren;
use App\App\Domain\Traits\IsOrderable;
use App\Products\Domain\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	use HasChildren, IsOrderable;

	protected $fillable = [
		'name',
		'slug',
		'order',
	];
	// self refferal one to many relationship
	public function children() {
		return $this->hasMany(Category::class, 'parent_id', 'id');
	}
	public function parents() {
		return $this->belongsTo(Category::class, 'parent_id', 'id');
	}
	public function products() {
		return $this->belongsToMany(Product::class);
	}
}
