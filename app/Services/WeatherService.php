<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\City;
use App\Models\WeatherData;
use GuzzleHttp\Client;

class WeatherService
{
    protected $apiKey;
    protected $apiBaseUrl;
    protected $client;

    public function __construct()
    {   
        $this->client = new Client();
        $this->apiKey = config('services.openweathermap.api_key');
        $this->apiBaseUrl = 'https://api.openweathermap.org/data/2.5';
    }

    public function getWeather($location)
    {
        // Fetch weather data from the external API
        $response = Http::get("$this->apiBaseUrl/weather", [
            'q' => $location, 
            'appid' => $this->apiKey,
            'units' => 'metric', // Change to 'imperial' for Fahrenheit unit
        ]);

        $weatherData = json_decode($response->getBody(), true);

        // Store weather data in the database
        $city = City::Create(['name' => $location]);
        $city->weatherData()->create([
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
        ]);

        return $response->json();
    }

    public function getWeatherData($cityName)
    {
        // Fetch weather data from the external API
        $response = $this->client->get("http://api.openweathermap.org/data/2.5/weather?q={$cityName}&appid={$this->apiKey}&units=metric");
        $weatherData = json_decode($response->getBody(), true);

        // Store weather data in the database
        $city = City::Create(['name' => $cityName]);

        WeatherData::create([
            'city_id' => $city->id,
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
        ]);

        return [
            'city' => $cityName,
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
        ];
    }
}
