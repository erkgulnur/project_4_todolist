<?php

namespace App\Services;

class WeatherApiService
{
    public function getWeatherData()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://weatherapi-com.p.rapidapi.com/current.json', [
            'headers' => [
                'X-RapidAPI-Key' => '80e79043b1mshdec5cb1b80b7481p127de0jsnc57abf1130e4',
                'X-RapidAPI-Host' => 'weatherapi-com.p.rapidapi.com'
            ],
            'query' => [
                'q' => 'Almaty'
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}