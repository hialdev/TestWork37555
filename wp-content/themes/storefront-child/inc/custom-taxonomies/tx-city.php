<?php

function register_tax_city() {
    register_taxonomy('city_taxonomy', 'camplocation', [
        'label' => 'Cities',
        'hierarchical' => true,
        'public' => true,
    ]);
}
add_action('init', 'register_tax_city');