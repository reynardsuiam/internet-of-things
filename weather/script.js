function getWeather() {

    const cityName = document.getElementById("cityInput").value;

    if (cityName === "") {
        document.getElementById("error").textContent =
            "Please enter a city name.";

        return;
    }

    document.getElementById("loading").textContent =
        "Loading...";

    document.getElementById("error").textContent = "";

    document.getElementById("weatherData").style.display = "none";


    // STEP 1: Find the location
    const geoURL =
        "https://geocoding-api.open-meteo.com/v1/search" +
        "?name=" + encodeURIComponent(cityName) +
        "&count=1" +
        "&language=en" +
        "&format=json";


    fetch(geoURL)

        .then(response => response.json())

        .then(locationData => {

            if (!locationData.results) {
                throw new Error("City not found.");
            }

            const location = locationData.results[0];

            const latitude = location.latitude;
            const longitude = location.longitude;

            const city = location.name;
            const country = location.country;


            // STEP 2: Get weather using coordinates
            const weatherURL =
                "https://api.open-meteo.com/v1/forecast" +
                "?latitude=" + latitude +
                "&longitude=" + longitude +
                "&current=temperature_2m,relative_humidity_2m,wind_speed_10m";


            return fetch(weatherURL)
                .then(response => response.json())
                .then(weatherData => {

                    return {
                        city: city,
                        country: country,
                        weather: weatherData.current
                    };

                });

        })

        .then(data => {

            // Display location
            document.getElementById("city").textContent =
                data.city + ", " + data.country;
            
            // Display temperature
            document.getElementById("temperature").textContent =
                data.weather.temperature_2m;


            // Display humidity
            document.getElementById("humidity").textContent =
                data.weather.relative_humidity_2m;


            // Display wind speed
            document.getElementById("wind").textContent =
                data.weather.wind_speed_10m;


            // Hide loading
            document.getElementById("loading").textContent = "";


            // Display weather card
            document.getElementById("weatherData").style.display =
                "block";

        })

        .catch(error => {

            document.getElementById("loading").textContent = "";

            document.getElementById("error").textContent =
                error.message;

        });
}
