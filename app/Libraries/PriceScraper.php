<?php

namespace App\Libraries;

use App\Product;
use Goutte\Client;

class PriceScraper
{
    public static function scrape()
    {
        $products = Product::all();
        $client = new Client();
        $prices = [];
        foreach ($products as $product) {
            $crawler = $client->request('GET', $product->url);
            $data = [
                'product_id' => $product->id,
                'prices' => [],
            ];
            $crawler->filter('td > span.mdl-color-text--primary.price')->each(function ($node, $index) use (&$data) {
                $data['prices'][$index] = [
                    'price' => substr(trim($node->text()), 2),
                ];
            });
            $crawler->filter('td > img.retailer-thumbnail-s')->each(function ($node, $index) use (&$data) {
                $data['prices'][$index]['image'] = trim($node->attr('src'));
            });
            if (isset($data['prices'][0])) {
                $prices[] = $data;
            }
        }
        return $prices;
    }
}
