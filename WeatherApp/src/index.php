<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

use Pc\WeatherApp\Service\WeatherService;

$service = new WeatherService();
$city = $argv['1'];
$result = $service->getWeather($city);
foreach ($result as $key => $value) {
    echo "$key - $value" . PHP_EOL;
}
