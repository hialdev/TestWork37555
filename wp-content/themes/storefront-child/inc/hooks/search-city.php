<?php
add_action('wp_ajax_my_action', 'my_function');
add_action('wp_ajax_nopriv_my_action', 'my_function');
function my_function() {
    if (! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'city_search_nonce' ) ) {
        die('Permission Denied');
    }

    global $wpdb;
    // Sanitize 
    $search_term = sanitize_text_field($_POST['search_term']);

    // Query 
    $query = "
        SELECT p.ID, p.post_title, pm_lat.meta_value AS latitude, pm_lon.meta_value AS longitude, t.name AS country
        FROM {$wpdb->posts} p
        LEFT JOIN {$wpdb->prefix}postmeta pm_lat ON p.ID = pm_lat.post_id AND pm_lat.meta_key = '_latitude'
        LEFT JOIN {$wpdb->prefix}postmeta pm_lon ON p.ID = pm_lon.post_id AND pm_lon.meta_key = '_longitude'
        LEFT JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
        LEFT JOIN {$wpdb->terms} t ON tr.term_taxonomy_id = t.term_id
        LEFT JOIN {$wpdb->term_taxonomy} tt ON t.term_id = tt.term_id
        WHERE p.post_type = 'cities' AND tt.taxonomy = 'countries'
        AND p.post_title LIKE %s
        ORDER BY t.name, p.post_title
    ";

    $results = $wpdb->get_results($wpdb->prepare($query, '%' . $wpdb->esc_like($search_term) . '%'));

    if ($results) {
        $data = array();
        foreach ($results as $row) :
            $weather_data = get_weather_data($row->latitude, $row->longitude);
            $weather = $weather_data['weather'];
            $icon_url = $weather_data['icon_url'];
            $data[] = array(
                'country' => $row->country,
                'city' => $row->post_title,
                'temperature' => $weather['temperature'],
                'condition' => $weather['condition'],
                'icon_url' => $icon_url,
            );
        endforeach;
        wp_send_json_success($data);
    } else {
        wp_send_json_error('No cities found');
    }

    wp_die();
}

