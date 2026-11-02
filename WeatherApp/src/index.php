<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

$client = new \GuzzleHttp\Client();
try {
    $response = $client->request('GET', "https://api.openweathermap.org/data/2.5/weather?lat=48.6723&lon=44.4492&appid=ed38a4cefa4558c787ea6d45c03ce4fd");

    echo $response->getStatusCode() . PHP_EOL;
    echo $response->getHeaderLine('content-type') . PHP_EOL;
    $obj = json_decode($response->getBody()->getContents(), true, 100);
    echo $obj['weather'][0]['description'] . PHP_EOL;
    echo $obj['visibility'] . PHP_EOL;
    echo $obj['clouds']['all'] . PHP_EOL;
    echo $obj['name'] . PHP_EOL;
} catch (\Throwable $e) {
    echo $e->getMessage();
}
