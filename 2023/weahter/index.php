
<?php
include "weather.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Weather Application</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Weather App</h1>

        <p class="subtitle">Check the weather in your city</p>

        <form method="GET" action="index.php">

            <input
                type="text"
                name="city"
                placeholder="Enter city name..."
                value="<?php echo htmlspecialchars($city); ?>"
                required
            >

            <button type="submit">Search</button>

        </form>

        <?php if ($weather && isset($weather["error"])): ?>

            <div class="error">
                <?php echo htmlspecialchars($weather["error"]); ?>
            </div>

        <?php elseif ($weather): ?>

            <div class="weather-card">

                <h2>
                    <?php echo htmlspecialchars($weather["city"]); ?>,
                    <?php echo htmlspecialchars($weather["country"]); ?>
                </h2>

                <h1 class="temperature">
                    <?php echo htmlspecialchars($weather["temperature"]); ?>°C
                </h1>

                <h3>
                    <?php echo htmlspecialchars($weather["condition"]); ?>
                </h3>

                <div class="details">

                    <div class="detail-box">
                        <span>Feels Like</span>
                        <h3><?php echo htmlspecialchars($weather["feels_like"]); ?>°C</h3>
                    </div>

                    <div class="detail-box">
                        <span>Humidity</span>
                        <h3><?php echo htmlspecialchars($weather["humidity"]); ?>%</h3>
                    </div>

                    <div class="detail-box">
                        <span>Wind Speed</span>
                        <h3><?php echo htmlspecialchars($weather["wind"]); ?> km/h</h3>
                    </div>

                </div>

            </div>

        <?php else: ?>

            <div class="welcome">
                <h2>Welcome!</h2>
                <p>Enter a city above to discover its current weather.</p>
            </div>

        <?php endif; ?>

    </div>

</body>
</html>
