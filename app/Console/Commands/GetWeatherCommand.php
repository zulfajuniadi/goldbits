<?php

namespace App\Console\Commands;

use App\Libraries\WeatherScraper;
use App\Weather;
use Illuminate\Console\Command;

class GetWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to get KL weather';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Weather::createFromResponse(WeatherScraper::scrape());
    }
}
