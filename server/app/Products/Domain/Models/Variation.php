<?php

namespace App\Products\Domain\Models;

use App\App\Cart\Money;
use App\App\Domain\Traits\HasPrice;
use App\Products\Domain\Models\Product;
use App\Products\Domain\Models\ProductVariationType;
use App\Products\Domain\Models\Variation;
use App\Stocks\Domain\Models\Stock;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasPrice;
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'order',
        'product_variation_type_id',
    ];
    public function priceVaries()
    {
        return $this->price->amount() !== $this->product->price->amount();
    }
    public function stockCount()
    {
        return $this->stock->sum('pivot.stock');
    }
    public function inStock()
    {
        return (bool) $this->stock->first()->pivot->in_stock;
    }
    public function getPriceAttribute($value)
    {
        if ($value == null) {
            return $this->product->price;
        }

        return new Money($value);
    }
    public function type()
    {
        return $this->hasOne(ProductVariationType::class, 'id', 'product_variation_type_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class, 'variation_id', 'id');
    }
    public function stock()
    {
        return $this->belongsToMany(Variation::class, 'product_variation_stock_view')
            ->withPivot([
                'stock',
                'in_stock',
            ]);
    }
}
