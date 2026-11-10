
<?php

function getWeather($city) {

    $geoUrl = "https://geocoding-api.open-meteo.com/v1/search?name="
        . urlencode($city) . "&count=1&language=en&format=json";

    $geoResponse = @file_get_contents($geoUrl);

    if ($geoResponse === false) {
        return ["error" => "Unable to connect to the weather service."];
    }

    $geoData = json_decode($geoResponse, true);

    if (empty($geoData["results"])) {
        return ["error" => "City not found. Please try another city."];
    }

    $location = $geoData["results"][0];

    $latitude = $location["latitude"];
    $longitude = $location["longitude"];

    // Step 2: Get weather information
    $weatherUrl = "https://api.open-meteo.com/v1/forecast?"
        . "latitude=$latitude&longitude=$longitude"
        . "&current=temperature_2m,relative_humidity_2m,"
        . "apparent_temperature,wind_speed_10m,weather_code";

    $weatherResponse = @file_get_contents($weatherUrl);

    if ($weatherResponse === false) {
        return ["error" => "Unable to retrieve weather information."];
    }

    $weatherData = json_decode($weatherResponse, true);

    if (!isset($weatherData["current"])) {
        return ["error" => "Weather information is unavailable."];
    }

    $current = $weatherData["current"];

    // Step 3: Weather descriptions
    $conditions = [
        0 => "Clear Sky",
        1 => "Mainly Clear",
        2 => "Partly Cloudy",
        3 => "Overcast",
        45 => "Foggy",
        48 => "Foggy",
        51 => "Light Drizzle",
        53 => "Drizzle",
        55 => "Heavy Drizzle",
        61 => "Light Rain",
        63 => "Rain",
        65 => "Heavy Rain",
        71 => "Light Snow",
        73 => "Snow",
        75 => "Heavy Snow",
        80 => "Rain Showers",
        81 => "Rain Showers",
        82 => "Heavy Rain Showers",
        95 => "Thunderstorm"
    ];

    $code = $current["weather_code"];

    return [
        "city" => $location["name"],
        "country" => $location["country"] ?? "",
        "temperature" => $current["temperature_2m"],
        "feels_like" => $current["apparent_temperature"],
        "humidity" => $current["relative_humidity_2m"],
        "wind" => $current["wind_speed_10m"],
        "condition" => $conditions[$code] ?? "Unknown"
    ];
}

$weather = null;
$city = "";

if (isset($_GET["city"]) && trim($_GET["city"]) !== "") {
    $city = trim($_GET["city"]);
    $weather = getWeather($city);
}

?>
