<?php

function add_mb_cities() {
    // Meta Box cities
    add_meta_box('cities_meta_box', 'cities Details', 'render_mb_cities', 'cities', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_mb_cities');

// Show input in meta box
function render_mb_cities($post) {
    // Nonce
    wp_nonce_field('cities_meta_box_nonce', 'meta_box_nonce');

    $latitude = get_post_meta($post->ID, '_latitude', true);
    $longitude = get_post_meta($post->ID, '_longitude', true);
    ?>
    <p>
        <label>Latitude:</label>
        <input type="text" name="latitude" value="<?php echo esc_attr($latitude); ?>" />
    </p>
    <p>
        <label>Longitude:</label>
        <input type="text" name="longitude" value="<?php echo esc_attr($longitude); ?>" />
    </p>
    <?php
}

function save_cities_meta_data($post_id) {
    // Validate
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'cities_meta_box_nonce')) {
        return;
    }

    // Auto save skip
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Validate post type 'cities'
    if (get_post_type($post_id) != 'cities') {
        return;
    }

    // Check data & Save
    if (isset($_POST['latitude'])) {
        update_post_meta($post_id, '_latitude', sanitize_text_field($_POST['latitude']));
    }
    if (isset($_POST['longitude'])) {
        update_post_meta($post_id, '_longitude', sanitize_text_field($_POST['longitude']));
    }
}

add_action('save_post', 'save_cities_meta_data');