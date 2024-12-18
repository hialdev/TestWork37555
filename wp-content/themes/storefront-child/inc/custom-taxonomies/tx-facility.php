<?php

function create_tx_facility() {
    register_taxonomy(
        'facility', 
        'camplocation', 
        array(
            'labels' => array(
                'name' => 'Facilities',
                'singular_name' => 'Facility',
                'search_items' => 'Search Facilities',
                'all_items' => 'All Facilities',
                'parent_item' => 'Parent Facility',
                'parent_item_colon' => 'Parent Facility:',
                'edit_item' => 'Edit Facility',
                'update_item' => 'Update Facility',
                'add_new_item' => 'Add New Facility',
                'new_item_name' => 'New Facility Name',
                'menu_name' => 'Facilities',
            ),
            'hierarchical' => false, 
            'show_ui' => true,
            'show_in_rest' => true, 
        )
    );
}
add_action('init', 'create_tx_facility');
