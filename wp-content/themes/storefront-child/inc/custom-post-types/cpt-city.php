<?php

function register_cpt_city(){
  register_post_type('city', [
    'label' => 'Cities',
    'public' => true,
    'supports' => ['title', 'thumbnail'],
    'has_archive' => false,
    'menu_icon' => 'dashicons-building',
    'show_rest' => true,
  ]);
}

add_action('init', 'register_cpt_city');