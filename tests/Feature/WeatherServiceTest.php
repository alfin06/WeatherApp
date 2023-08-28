<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\WeatherService;
use Illuminate\Foundation\Testing\WithFaker;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class WeatherServiceTest extends TestCase
{
    /** @test */
    public function it_can_get_weather_data_from_api_and_store_in_database()
    {
        $cityName = 'Sample City';

        // Mock the Guzzle client and response
        $mockedResponse = new Response(200, [], json_encode([
            'main' => ['temp' => 25],
            'weather' => [['description' => 'Sunny']],
        ]));

        $mockedClient = $this->mock(Client::class, function ($mock) use ($mockedResponse) {
            $mock->shouldReceive('get')->andReturn($mockedResponse);
        });

        // Create a fake city
        $city = \App\Models\City::factory()->create(['name' => $cityName]);

        // Create an instance of WeatherService
        $weatherService = new WeatherService();

        // Call the method and assert the response
        $weatherData = $weatherService->getWeatherData($cityName);

        $this->assertEquals([
            'city' => $cityName,
            'temperature' => 25,
            'description' => 'Sunny',
        ], $weatherData);

        // Assert that weather data is stored in the database
        $this->assertDatabaseHas('weather_data', [
            'city_id' => $city->id,
            'temperature' => 25,
            'description' => 'Sunny',
        ]);
    }
}