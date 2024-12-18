<?php

function register_cpt_camplocation(){
  register_post_type('camplocation', [
      'label' => 'Camp Locations',
      'public' => true,
      'supports' => ['title', 'thumbnail', 'editor'],
      'has_archive' => false,
      'show_ui' => true,
      'menu_icon' => 'dashicons-location-alt',
      'show_rest' => true,
  ]);
}

add_action('init', 'register_cpt_camplocation');