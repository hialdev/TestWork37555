<?php
// Location Meta
function get_location_meta($post_id) {
    $latitude = get_post_meta($post_id, '_latitude', true);
    $longitude = get_post_meta($post_id, '_longitude', true);
    return array('latitude' => $latitude, 'longitude' => $longitude);
}

// API openweatherorg
function get_weather_data($latitude, $longitude) {
    $api_key = 'bf14d430002e6b686c80cc74f4895979'; 
    $api_url = 'http://api.openweathermap.org/data/2.5/weather?lat=' . $latitude . '&lon=' . $longitude . '&appid=' . $api_key . '&units=metric'; // API endpoint dengan koordinat

    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return array(
            'weather' => 'Weather data not available',
            'icon_url' => 'https://openweathermap.org/img/wn/01d.png' 
        );
    }

    $data = wp_remote_retrieve_body($response);
    $weather = json_decode($data);

    if ($weather && isset($weather->main)) {
        $temperature = $weather->main->temp; 
        $weather_description = $weather->weather[0]->description; 
        $icon_code = $weather->weather[0]->icon; 
        $icon_url = "http://openweathermap.org/img/wn/{$icon_code}.png"; 

        return array(
            'weather' => array(
                'temperature' => $temperature,
                'condition' => ucfirst($weather_description)
            ),
            'icon_url' => $icon_url
        );
    } else {
        return array(
            'weather' => 'Weather data not found',
            'icon_url' => 'https://openweathermap.org/img/wn/01d.png' 
        );
    }
}


// Includes
require_once 'inc/custom-post-types/cpt-cities.php'; // For Task Met
require_once 'inc/custom-post-types/cpt-city.php';
require_once 'inc/custom-post-types/cpt-country.php';
require_once 'inc/custom-post-types/cpt-camp.php';

require_once 'inc/custom-taxonomies/tx-countries.php'; // For Task Met
require_once 'inc/custom-taxonomies/tx-facility.php';

require_once 'inc/meta-boxes/mb-camp.php';
require_once 'inc/meta-boxes/mb-city.php';
require_once 'inc/meta-boxes/mb-cities.php'; // For Task Met
require_once 'inc/meta-boxes/mb-country.php';

require_once 'inc/custom-widgets/wg-weather.php';

require_once 'inc/customizes/hero-section.php';
require_once 'inc/customizes/stat-section.php';
require_once 'inc/customizes/cta-section.php';

require_once 'inc/hooks/search-city.php'; // For task Met

function enqueue_assets() {
    // Enqueue Owl Carousel CSS
    wp_enqueue_style('al-style', '/wp-content/themes/storefront-child/assets/css/styles.css');
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
    // Enqueue Owl Carousel JS
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    wp_enqueue_script('al-carousel', '/wp-content/themes/storefront-child/assets/js/carousel.js', array('jquery'), '2.3.4', true);
}
add_action('wp_enqueue_scripts', 'enqueue_assets');

?>