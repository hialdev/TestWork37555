<?php
function freshcamp_customize_statistics_section($wp_customize) {
    $wp_customize->add_section('statistics_section', [
        'title'       => __('Statistics Section', 'freshcamp'),
        'description' => __('Customize the Statistics Section', 'freshcamp'),
        'priority'    => 120,
    ]);

    // Statistics 1
    $wp_customize->add_setting('statistic1_title', ['default' => 'Total Campgrounds']);
    $wp_customize->add_setting('statistic1_value', ['default' => '14']);
    $wp_customize->add_setting('statistic1_description', ['default' => 'spread in 3 countries']);
    $wp_customize->add_control('statistic1_title_control', [
        'label'    => __('Statistic 1 Title', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic1_title',
        'type'     => 'text',
    ]);
    $wp_customize->add_control('statistic1_value_control', [
        'label'    => __('Statistic 1 Value', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic1_value',
        'type'     => 'text',
    ]);
    $wp_customize->add_control('statistic1_description_control', [
        'label'    => __('Statistic 1 Description', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic1_description',
        'type'     => 'text',
    ]);

    // Statistics 2
    $wp_customize->add_setting('statistic2_title', ['default' => 'Satisfied Campers']);
    $wp_customize->add_setting('statistic2_value', ['default' => '238k']);
    $wp_customize->add_setting('statistic2_description', ['default' => 'most of that have a routine schedule']);
    $wp_customize->add_control('statistic2_title_control', [
        'label'    => __('Statistic 2 Title', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic2_title',
        'type'     => 'text',
    ]);
    $wp_customize->add_control('statistic2_value_control', [
        'label'    => __('Statistic 2 Value', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic2_value',
        'type'     => 'text',
    ]);
    $wp_customize->add_control('statistic2_description_control', [
        'label'    => __('Statistic 2 Description', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic2_description',
        'type'     => 'text',
    ]);

    // Statistics 3
    $wp_customize->add_setting('statistic3_title', ['default' => 'Positive Reviews']);
    $wp_customize->add_setting('statistic3_value', ['default' => '98%']);
    $wp_customize->add_setting('statistic3_description', ['default' => 'we always give best']);
    $wp_customize->add_control('statistic3_title_control', [
        'label'    => __('Statistic 3 Title', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic3_title',
        'type'     => 'text',
    ]);
    $wp_customize->add_control('statistic3_value_control', [
        'label'    => __('Statistic 3 Value', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic3_value',
        'type'     => 'text',
    ]);
    $wp_customize->add_control('statistic3_description_control', [
        'label'    => __('Statistic 3 Description', 'freshcamp'),
        'section'  => 'statistics_section',
        'settings' => 'statistic3_description',
        'type'     => 'text',
    ]);
}
add_action('customize_register', 'freshcamp_customize_statistics_section');
