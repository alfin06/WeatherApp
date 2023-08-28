<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;
use App\Models\City;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        return view('weather.index');
    }

    public function getWeather(Request $request)
    {
        $location = $request->input('location');
        $weatherData = $this->weatherService->getWeather($location);

        // Check if the API response contains an error message
        if (isset($weatherData['cod']) && $weatherData['cod'] === '404') 
        {
            $errorMessage = 'Location not found. Please enter a valid location.';
           
            return view('weather.index', compact('errorMessage'));
        }

        return view('weather.index', compact('weatherData'));
    }

    public function getWeatherFromAPI(Request $request, $city)
    {
        $weatherData = $this->weatherService->getWeatherData($city);

        return response()->json($weatherData);
    }
    
    public function getCities(Request $request)
    {
        $cities = City::all();

        return response()->json($cities);
    }
}