<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
</head>
<body>
    <h1>Weather App</h1>

    <form method="POST" action="/weather">
        @csrf
        <label for="location">Enter Location: </label>
        <input type="text" name="location" required>
        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='/'">Clear</button>
    </form>

    @if(isset($errorMessage))
        <p style="color: red;">{{ $errorMessage }}</p>
    @endif

    @if(isset($weatherData))
        <h2>Weather Information for {{ $weatherData['name'] }}</h2>
        <p>Temperature: {{ $weatherData['main']['temp'] }} °C</p>
        <p>Weather: {{ $weatherData['weather'][0]['description'] }}</p>
        <p>Humidity: {{ $weatherData['main']['humidity'] }}%</p>
        <p>Wind Speed: {{ $weatherData['wind']['speed'] }} m/s</p>
    @endif
</body>
</html>
