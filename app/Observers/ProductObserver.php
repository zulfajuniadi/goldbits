<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->price = $product->mid_price;
        $product->code = md5(microtime());
    }

    public function updated(Product $product)
    {
        if (!in_array('price', array_keys($product->getDirty()))) {
            $product->adjust();
        }
    }

}
