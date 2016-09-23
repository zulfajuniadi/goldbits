<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitorPrice extends Model
{

    // protected $table = 'competitor_price';

    protected $fillable = [
        'product_id',
        'url',
        'price',
    ];

    public static function createFromScraper($priceDetails = [])
    {
        foreach ($priceDetails as $details) {
            CompetitorPrice::where('product_id', $details['product_id'])->delete();
            foreach ($details['prices'] as $price) {
                CompetitorPrice::create([
                    'product_id' => $details['product_id'],
                    'url' => $price['image'],
                    'price' => $price['price'],
                ]);
            }
        }
    }
    //
}
