<?php

function create_countries_taxonomy() {
    register_taxonomy('countries', 'cities', array(
        'labels' => array(
            'name' => 'Countries',
            'singular_name' => 'Country',
        ),
        'show_ui' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_countries_taxonomy');