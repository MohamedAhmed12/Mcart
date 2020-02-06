<?php

namespace App\Products\Domain\Models;

use App\App\Domain\Traits\CanBeScoped;
use App\App\Domain\Traits\HasPrice;
use App\Categories\Domain\Models\Category;
use App\Products\Domain\Models\Variation;
use Illuminate\Database\Eloquent\Model;

/**
 * Get the route key for the model.
 *
 * @return string
 */
class Product extends Model
{
    use CanBeScoped, HasPrice;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function variations()
    {
        return $this->hasMany(Variation::class)->orderBy('order', 'asc');
    }
    public function stockCount()
    {
        return $this->variations->sum(function ($variation) {
            return $variation->stockCount();
        });
    }
    public function inStock()
    {
        return $this->stockCount() > 0;
    }
}
