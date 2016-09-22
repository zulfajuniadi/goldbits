<?php

namespace App\Libraries;

use GuzzleHttp\Client;

class WeatherScraper
{
    public static function scrape()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?q=Kuala%20Lumpur,my&units=metric&APPID=' . env('OW_API_KEY'));
        return json_decode((string) $response->getBody(), true);
    }
}
