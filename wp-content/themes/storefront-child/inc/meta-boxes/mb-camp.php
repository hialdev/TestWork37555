<?php

function add_mb_camp() {
    // Meta Box camp
    add_meta_box('camplocation_meta_box', 'Camp Location Details', 'render_mb_camp', 'camplocation', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_mb_camp');

// Show input in Meta Box
function render_mb_camp($post) {
    // Nonce
    wp_nonce_field('camplocation_meta_box_nonce', 'meta_box_nonce');

    // Get Data
    $latitude = get_post_meta($post->ID, '_latitude', true);
    $longitude = get_post_meta($post->ID, '_longitude', true);
    $facilities = get_post_meta($post->ID, '_facilities', true);
    // Ambil city ID yang sudah dipilih (jika ada)
    $city_id = get_post_meta($post->ID, '_city_id', true);

    // Ambil semua post city
    $cities = get_posts([
        'post_type' => 'city',  // CPT city
        'posts_per_page' => -1     // getAll
    ]);

    ?>
    <p>
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" value="<?php echo esc_attr($latitude); ?>" />
    </p>
    <p>
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" value="<?php echo esc_attr($longitude); ?>" />
    </p>
    <p>
        <label for="city_select">Select City : </label>
        <select name="city_select" id="city_select">
            <option value="">Select City</option>
            <?php foreach ($cities as $city) : ?>
                <option value="<?php echo $city->ID; ?>" <?php selected($city_id, $city->ID); ?>>
                    <?php echo esc_html($city->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    
    <?php
}

// Save
function save_camp_meta_data($post_id) {
    // Validate
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'camplocation_meta_box_nonce')) {
        return;
    }

    // Auto save skip
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Validate post type 'camplocation'
    if (get_post_type($post_id) != 'camplocation') {
        return;
    }

    // Check data & Save
    if (isset($_POST['latitude'])) {
        update_post_meta($post_id, '_latitude', sanitize_text_field($_POST['latitude']));
    }
    if (isset($_POST['longitude'])) {
        update_post_meta($post_id, '_longitude', sanitize_text_field($_POST['longitude']));
    }
    if (isset($_POST['city_select'])) {
        update_post_meta($post_id, '_city_id', sanitize_text_field($_POST['city_select']));
    }
}

add_action('save_post', 'save_camp_meta_data');
