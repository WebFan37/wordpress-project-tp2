<?php get_header(); ?>

    <div id="accueil" class="global">
        <section>
            <h2>MORE IN DETAIL / PLUS EN DÉTAIL</h2>
            <div class="cours">   
                <?php 
                
                    if(have_posts()):the_post();
                        
                       
                    ?>
                    <div class="carte-single">
                        <h2><?php the_title() ?></h2>
                        <h2><?php the_post_thumbnail("large")?></h2>
                        <p><?php the_content(); ?></p>
                        <div class="ville">Ville avoisinante: <?php the_field("ville_avoisinante") ?></div>
                        
                        

                        <?php
                            // ========================
                            // DISCLAIMER: CODE WRITTEN BY AI 🙄
                            // ========================


                            // ========================
                            // MY GOOGLE MAPS API KEY: AIzaSyAH-QQKv0qmK7JzBK17LRKiUYXv_KbJUpI
                            // ========================


                            // Replace 'YOUR_API_KEY' with your actual API key
                            $apiKey = '9ccef00f2f2511c770aa4a2c6f822eab';

                            // Replace 'CITY_NAME' with the name of the city you want weather data for
                            $city = 'Montreal';

                            // Construct the API URL
                            $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";

                            // Make the HTTP request and fetch the response
                            $response = file_get_contents($url);

                            // Check if the response is successful
                            if ($response !== false) {
                                // Decode the JSON response
                                $weatherData = json_decode($response, true);

                                // Check if there are any errors in the response
                                if (isset($weatherData['cod']) && $weatherData['cod'] == 200) {
                                    // Extract the weather information
                                    $minTemperature = $weatherData['main']['temp_min'];
                                    $maxTemperature = $weatherData['main']['temp_max'];
                                    $temperature = $weatherData['main']['temp'];
                                    $avgTemperature = ($minTemperature + $maxTemperature) / 2;
                                    $humidity = $weatherData['main']['humidity'];
                                    $description = $weatherData['weather'][0]['description'];

                                    // Output the weather information
                                    echo "<div class=weather-information>";
                                    echo "<div class=temperatures>";
                                    echo "<div>Temp-min: " . ($minTemperature - 273.15) . "°C </div>";
                                    echo "<div>Temp-max: " . ($maxTemperature - 273.15) . "°C </div>";
                                    echo "<div>Temp-moyen: " . ($avgTemperature - 273.15) . "°C </div>";
                                    echo "<div>Temp-maintenant: " . ($temperature - 273.15) . "°C</div>";
                                    echo "</div>";
                                    echo "<div class=other-weather>";
                                    echo "<div>Humidité: " . $humidity . "% </div>";
                                    echo "<div>Description: " . $description . "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                } else {
                                    // Handle errors
                                    echo "Error: Unable to fetch weather data.";
                                }
                            } else {
                                // Handle HTTP request failure
                                echo "Error: Unable to connect to OpenWeatherMap API.";
                            }
                        ?>
                    </div> 
                <?php endif ?>



                
            
            </div>
        </section>
    </div>
    <div id="galerie" class="global">
        <section>
            <h2>Galerie</h2>
            <?php 
                echo do_shortcode('[em_destination]'); 
            ?>
            

            
       
        </section>
        
    </div>

    
    <?php get_footer(); ?>