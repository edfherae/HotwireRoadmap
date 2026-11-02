<?php

declare(strict_types=1);

namespace Pc\WeatherApp\Service;

use GuzzleHttp\Client;

class WeatherService
{
    private Client $client;

    function __construct(
        public readonly string $apiKey = 'ed38a4cefa4558c787ea6d45c03ce4fd',
        public readonly string $url = 'https://api.openweathermap.org/data/2.5/weather'
    ) {
        $this->client = new Client();
    }

    public function getWeather(string $city): array
    {
        $response = $this->client->get($this->url, [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]
        ]);
        $data = json_decode($response->getBody()->getContents(), true, 5);

        return [
            'city' => $data['name'],
            'weather' => $data['weather'][0]['main'],
            'temperature' => "{$data['main']['temp']} deg Celsius",
            'wind' => "{$data['wind']['speed']} m/s",
        ];
    }
}
