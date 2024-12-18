<?php
/**
 * Template Name: Weather Table
 * 
 * Template untuk menampilkan tabel negara, kota, dan suhu.
 * 
 * @package your-theme-name
 */

// Memuat header
get_header();

do_action('before_weather_table');
?>
<section class="container mx-auto md:p-10">
  <div class="card">
    <div class="card-body shadow rounded-2xl">
      <h3 class="font-semibold text-xl">Widget City Weather</h3>
      <?php the_widget('City_Weather_Widget', array('selected_city' => 123)); ?>
    </div>
  </div>
</section>
<section class="container mx-auto md:p-10">
    <h2 class="text-3xl font-semibold mb-5">Weather Data for Cities</h2>

    <!-- Search City -->
    <div class="weather-search">
        <input type="text" id="city_search" placeholder="Search for a city..." />
    </div>

    <!-- Table -->
    <table class="weather-table table">
        <thead>
            <tr>
                <th>Country</th>
                <th>City</th>
                <th>Temperature</th>
            </tr>
        </thead>
        <tbody id="table">
            <?php
            global $wpdb;

            // Mengambil data dari database
            $query = "
                SELECT p.ID, p.post_title, pm_lat.meta_value AS latitude, pm_lon.meta_value AS longitude, t.name AS country
                FROM {$wpdb->posts} p
                LEFT JOIN {$wpdb->prefix}postmeta pm_lat ON p.ID = pm_lat.post_id AND pm_lat.meta_key = '_latitude'
                LEFT JOIN {$wpdb->prefix}postmeta pm_lon ON p.ID = pm_lon.post_id AND pm_lon.meta_key = '_longitude'
                LEFT JOIN {$wpdb->term_relationships} tr ON p.ID = tr.object_id
                LEFT JOIN {$wpdb->terms} t ON tr.term_taxonomy_id = t.term_id
                LEFT JOIN {$wpdb->term_taxonomy} tt ON t.term_id = tt.term_id
                WHERE p.post_type = 'cities' AND tt.taxonomy = 'countries'
                ORDER BY t.name, p.post_title
            ";
            $results = $wpdb->get_results($query);

            if ($results) :
                foreach ($results as $row) :
                    $weather_data = get_weather_data($row->latitude, $row->longitude);
                    $weather = $weather_data['weather'];
                    $icon_url = $weather_data['icon_url'];
                ?>
                <tr>
                    <td><?php echo esc_html($row->country); ?></td>
                    <td><?php echo esc_html($row->post_title); ?></td>
                    <td>
                        <div class="flex items-center gap-2 p-0">
                            <div>
                                <img src="<?php echo esc_url($icon_url); ?>" alt="Weather Icon" style="height:4em; object-fit:contain;" />
                            </div>
                            <div class="">
                                <p class="temperature text-sm font-bold"><?php echo $weather['temperature']; ?>°C</p>
                                <p class="condition text-xs capitalize"><?php echo $weather['condition']; ?></p>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; else : ?>
                <tr><td colspan="3">No data available.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<?php
do_action('after_weather_table');

get_footer();
?>

<script>
jQuery(document).ready(function($){
    // Ajax for city search
    $('#city_search').on('input', function() {
        var searchTerm = $(this).val();

        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: "post",
            data: {
                action: 'my_action',
                search_term: searchTerm,
                security: '<?php echo wp_create_nonce('city_search_nonce'); ?>'
            },
            success: function(response) {
              // Menangani data yang diterima
              let rows = '';
                response.data.forEach(function(city) {
                    rows += `<tr>
                                <td>${city.country}</td>
                                <td>${city.city}</td>
                                <td>
                                    <div class="flex items-center gap-2 p-0">
                                        <div>
                                            <img src="${city.icon_url}" alt="Weather Icon" style="height:4em; object-fit:contain;" />
                                        </div>
                                        <div class="">
                                            <p class="temperature text-sm font-bold">${city.temperature}°C</p>
                                            <p class="condition text-xs capitalize">${city.condition}</p>
                                        </div>
                                    </div>
                                  </td>
                              </tr>`;
                });
              console.log(rows);
              $('table.weather-table tbody').html(rows);
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', status, error);
            }
        });
    });
});
</script>

