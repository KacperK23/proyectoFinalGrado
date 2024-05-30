<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use Carbon\Carbon;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
        Carbon::setLocale('es'); // Configurar Carbon para usar español
    }

    public function index()
    {
        $latitude = 41.1114599;
        $longitude = 0.09975628;

        $weatherData = $this->weatherService->getWeatherForecast($latitude, $longitude);

        return view('weather', ['weatherData' => $weatherData['daily']]);
    }
}
