<?php
// City Weather Widget
class City_Weather_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'city_weather_widget', // Widget ID
            __('City Weather Widget', 'text_domain'),
            array('description' => __('Displays a city and its current temperature.', 'text_domain'))
        );
    }

    // Form
    public function form($instance) {
        $selected_city = !empty($instance['selected_city']) ? $instance['selected_city'] : '';
        $cities = get_posts(array(
            'post_type' => 'cities',
            'posts_per_page' => -1
        ));
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('selected_city'); ?>">
                <?php _e('Select City:', 'text_domain'); ?>
            </label>
            <select id="<?php echo $this->get_field_id('selected_city'); ?>" name="<?php echo $this->get_field_name('selected_city'); ?>">
                <?php foreach ($cities as $city): ?>
                    <option value="<?php echo $city->ID; ?>" <?php selected($selected_city, $city->ID); ?>>
                        <?php echo $city->post_title; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    // Save data
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['selected_city'] = (!empty($new_instance['selected_city'])) ? strip_tags($new_instance['selected_city']) : '';
        return $instance;
    }

    // Output widget
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        $city_id = !empty($instance['selected_city']) ? $instance['selected_city'] : '';
        if ($city_id) {
            $city = get_post($city_id);
            $city_location = get_location_meta($city_id);

            // validate
            if (!empty($city_location['latitude']) && !empty($city_location['longitude'])) {
                $weather_data = get_weather_data($city_location['latitude'], $city_location['longitude']);
                $temperature = isset($weather_data['weather']['temperature']) ? $weather_data['weather']['temperature'] : __('N/A', 'text_domain');
                $condition = isset($weather_data['weather']['condition']) ? $weather_data['weather']['condition'] : __('N/A', 'text_domain');
                $icon_url = isset($weather_data['icon_url']) ? $weather_data['icon_url'] : '';
            } else {
                $temperature = __('Unknown', 'text_domain');
                $condition = __('Location not set', 'text_domain');
                $icon_url = '';
            }

            // show data
            ?>
            <div class="city-weather-widget">
                <h3><?php echo esc_html($city->post_title); ?></h3>
                <?php if ($icon_url): ?>
                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($condition); ?>">
                <?php endif; ?>
                <p><?php printf(__('Temperature: %s°C', 'text_domain'), esc_html($temperature)); ?></p>
                <p><?php echo esc_html($condition); ?></p>
            </div>
            <?php
        } else {
            echo __('No city selected.', 'text_domain');
        }

        echo $args['after_widget'];
    }
}

// regist widget
function register_city_weather_widget() {
    register_widget('City_Weather_Widget');
}
add_action('widgets_init', 'register_city_weather_widget');
