<?php

// /inc/custom-post-types/cpt-cities.php
function create_cities_post_type() {
    register_post_type('cities', array(
        'labels' => array(
            'name' => 'Cities',
            'singular_name' => 'City',
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_cities_post_type');
