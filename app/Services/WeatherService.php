<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getWeatherForecast($latitude, $longitude)
    {
        $response = $this->client->get("https://api.open-meteo.com/v1/forecast", [
            'query' => [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'daily' => 'temperature_2m_max,temperature_2m_min,weathercode',
                'timezone' => 'Europe/Madrid',
                'forecast_days' => 14, // Asegúrate de que la API acepta este parámetro
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
