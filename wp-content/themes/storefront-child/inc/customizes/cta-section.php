<?php
function cta_customize_register($wp_customize) {
    $wp_customize->add_section('cta_section', array(
        'title' => __('Call To Action Section', 'your-theme'),
        'description' => __('Customize the Call To Action section.', 'your-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('cta_background_image', array(
        'default' => 'http://127.0.0.1/TestWork37555/wp-content/uploads/2024/12/paul-hermann-XJuhZqEE4Go-unsplash-scaled.jpg',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_background_image_control', array(
        'label' => __('Background Image', 'your-theme'),
        'section' => 'cta_section',
        'settings' => 'cta_background_image',
    )));

    $wp_customize->add_setting('cta_title', array(
        'default' => 'Ready to explore more?',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('cta_title_control', array(
        'label' => __('Main Title', 'your-theme'),
        'section' => 'cta_section',
        'settings' => 'cta_title',
    ));

    $wp_customize->add_setting('cta_subtitle', array(
        'default' => 'Find your perfect campground today.',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('cta_subtitle_control', array(
        'label' => __('Subtitle', 'your-theme'),
        'section' => 'cta_section',
        'settings' => 'cta_subtitle',
    ));

    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Browse Campgrounds',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('cta_button_text_control', array(
        'label' => __('Button Text', 'your-theme'),
        'section' => 'cta_section',
        'settings' => 'cta_button_text',
    ));

    $wp_customize->add_setting('cta_button_url', array(
        'default' => '#',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('cta_button_url_control', array(
        'label' => __('Button URL', 'your-theme'),
        'section' => 'cta_section',
        'settings' => 'cta_button_url',
    ));
}

add_action('customize_register', 'cta_customize_register');
