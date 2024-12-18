<?php
function freshcamp_customize_register($wp_customize) {
    // Section Hero
    $wp_customize->add_section('freshcamp_hero_section', [
        'title' => __('Hero Settings', 'freshcamp'),
        'priority' => 30,
    ]);

    // Title `<h2>`
    $wp_customize->add_setting('hero_h2_text', [
        'default' => 'Discover the Best Campgrounds Worldwide',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hero_h2_text', [
        'label' => __('Hero H2 Text', 'freshcamp'),
        'section' => 'freshcamp_hero_section',
        'type' => 'text',
    ]);

    // Description `<p>`
    $wp_customize->add_setting('hero_p_text', [
        'default' => 'FreshCamp offers a wide selection of campgrounds across the globe, making your next adventure unforgettable.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('hero_p_text', [
        'label' => __('Hero Paragraph Text', 'freshcamp'),
        'section' => 'freshcamp_hero_section',
        'type' => 'textarea',
    ]);

    // Button `<a>` text
    $wp_customize->add_setting('hero_btn_text', [
        'default' => 'Start Your Adventure',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('hero_btn_text', [
        'label' => __('Hero Button Text', 'freshcamp'),
        'section' => 'freshcamp_hero_section',
        'type' => 'text',
    ]);

    // Button `<a>` link
    $wp_customize->add_setting('hero_btn_link', [
        'default' => '#explore',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('hero_btn_link', [
        'label' => __('Hero Button Link', 'freshcamp'),
        'section' => 'freshcamp_hero_section',
        'type' => 'url',
    ]);

    // Slider Image 1
    $wp_customize->add_setting('hero_slider_images_1', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_slider_images_1', [
        'label' => __('Slider Images 1', 'freshcamp'),
        'section' => 'freshcamp_hero_section',
        'mime_type' => 'image',
        'description' => 'Add image 1 for slider.',
    ]));

    // Slider Image 2
    $wp_customize->add_setting('hero_slider_images_2', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_slider_images_2', [
        'label' => __('Slider Images 2', 'freshcamp'),
        'section' => 'freshcamp_hero_section',
        'mime_type' => 'image',
        'description' => 'Add image 2 for slider.',
    ]));

    // Slider Image 3
    $wp_customize->add_setting('hero_slider_images_3', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_slider_images_3', [
        'label' => __('Slider Images 3', 'freshcamp'),
        'section' => 'freshcamp_hero_section',
        'mime_type' => 'image',
        'description' => 'Add image 3 for slider.',
    ]));
}
add_action('customize_register', 'freshcamp_customize_register');
