<?php
function add_country_meta_box() {
    add_meta_box(
        'country_meta_box',              // ID dari meta box
        'Select Country',                // Title
        'render_country_meta_box',       // Callback function
        'city',                          // Post type: City
        'side',                          // Context: bagian mana dari halaman edit
        'high'                           // Priority
    );
}
add_action('add_meta_boxes', 'add_country_meta_box');

function render_country_meta_box($post) {
    
    $country_id = get_post_meta($post->ID, '_country_id', true);

    
    $countries = get_posts([
        'post_type' => 'country',  // CPT Country
        'posts_per_page' => -1     // getAll
    ]);
    ?>
    <label for="country_select">Select Country</label>
    <select name="country_select" id="country_select">
        <option value="">Select Country</option>
        <?php foreach ($countries as $country) : ?>
            <option value="<?php echo $country->ID; ?>" <?php selected($country_id, $country->ID); ?>>
                <?php echo esc_html($country->post_title); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php
}

// Save
function save_country_meta($post_id) {
    // Validate not autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['country_select'])) {
        update_post_meta($post_id, '_country_id', sanitize_text_field($_POST['country_select']));
    }
}
add_action('save_post', 'save_country_meta');
