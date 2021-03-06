<?php

namespace App;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'code',
        'url',
        'expiry_date',
        'pricing_reason',
        'quantity',
        'weekly_sales',
        'price',
        'low_price',
        'mid_price',
        'high_price',
    ];

    public static function boot()
    {
        Product::observe(ProductObserver::class);
    }

    public function adjust()
    {
        $price_diff = (rand(-5, 5) / 100) * $this->price;
        $this->update([
            'price' => $this->price + $price_diff,
        ]);
    }

    public function competitors()
    {
        return $this->hasMany(CompetitorPrice::class);
    }
}
