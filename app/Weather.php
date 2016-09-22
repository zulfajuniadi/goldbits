<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public $fillable = [
        'temperature',
        'weather',
        'last_updated',
    ];

    public static function createFromResponse($response)
    {
        self::create([
            'temperature' => $response['main']['temp_max'],
            'weather' => $response['weather'][0]['main'],
            'last_updated' => date('Y-m-d H:i:s', $response['dt']),
        ]);
    }
    //
}
