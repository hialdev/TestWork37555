<?php

function add_mb_city() {
    // Meta Box City
    add_meta_box('city_meta_box', 'City Details', 'render_mb_city', 'city', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_mb_city');

// Show input in meta box
function render_mb_city($post) {
    // Nonce
    wp_nonce_field('city_meta_box_nonce', 'meta_box_nonce');

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

function save_city_meta_data($post_id) {
    // Validate
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'city_meta_box_nonce')) {
        return;
    }

    // Auto save skip
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Validate post type 'city'
    if (get_post_type($post_id) != 'city') {
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

add_action('save_post', 'save_city_meta_data');