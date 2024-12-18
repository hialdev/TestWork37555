<?php

function register_cpt_country(){
  register_post_type('country', [
    'label' => 'Countries',
    'public' => true,
    'supports' => ['title', 'thumbnail'],
    'has_archive' => false,
    'menu_icon' => 'dashicons-admin-site-alt',
    'show_ui' => true,
    'show_rest' => true,
  ]);
}

add_action('init', 'register_cpt_country');